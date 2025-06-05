<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\ForgotPasswordRequest;
use App\Http\Requests\Api\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\TransientToken;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
    // Token expiration time
    protected const ACCESS_TOKEN_EXPIRATION = 60; // minutes

    /**
     * Register a new user without issuing a token
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone ?? null
            ]);

            return response()->json([
                'status' => 'success',
                'data' => [
                    'user' => $this->getUserData($user)
                ],
                'message' => 'User registered successfully'
            ], 201);
        } catch (QueryException $e) {
            Log::error('Registration failed: Database error', [
                'error' => $e->getMessage(),
                'email' => $request->email
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to register user due to database error'
            ], 500);
        } catch (Exception $e) {
            Log::error('Registration failed: Unexpected error', [
                'error' => $e->getMessage(),
                'email' => $request->email
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred during registration'
            ], 500);
        }
    }

    /**
     * Authenticate user and issue token
     */
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            if (!Auth::attempt($request->only('email', 'password'))) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }

            $user = Auth::user();

            // Revoke all existing tokens (only PersonalAccessTokens can be deleted)
            $this->revokeUserTokens($user);

            // Create new access token
            $accessToken = $this->createAccessToken($user);

            return response()->json([
                'status' => 'success',
                'data' => [
                    'access_token' => $accessToken,
                    'token_type' => 'Bearer',
                    'expires_at' => Carbon::now()->addMinutes(self::ACCESS_TOKEN_EXPIRATION)->toIso8601String(),
                    'user' => $this->getUserData($user)
                ],
                'message' => 'Login successful'
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials',
                'errors' => $e->errors()
            ], 401);
        } catch (Exception $e) {
            Log::error('Login failed: Unexpected error', [
                'error' => $e->getMessage(),
                'email' => $request->email
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred during login'
            ], 500);
        }
    }

    /**
     * Handle forgot password request
     */
    public function forgotPassword(ForgotPasswordRequest $request): JsonResponse
    {
        try {
            $status = Password::sendResetLink(
                $request->only('email')
            );

            if ($status === Password::RESET_LINK_SENT) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Password reset link sent to your email'
                ], 200);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Unable to send reset link'
            ], 400);
        } catch (Exception $e) {
            Log::error('Forgot password failed', [
                'error' => $e->getMessage(),
                'email' => $request->email
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred while sending reset link'
            ], 500);
        }
    }

    /**
     * Update user profile including password
     */
    public function updateProfile(UpdateProfileRequest $request): JsonResponse
    {
        try {
            $user = $request->user();

            if (!$user) {
                throw new AuthenticationException('Unauthenticated');
            }

            $updateData = array_filter([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email
            ]);

            // Check if email is being updated and verify it's not taken
            if (isset($updateData['email']) && $updateData['email'] !== $user->email) {
                if (User::where('email', $updateData['email'])->exists()) {
                    throw ValidationException::withMessages([
                        'email' => ['The email address is already taken.'],
                    ]);
                }
            }

            // Handle password update if provided
            if ($request->filled('current_password') && $request->filled('new_password')) {
                if (!Hash::check($request->current_password, $user->password)) {
                    throw ValidationException::withMessages([
                        'current_password' => ['The current password is incorrect.'],
                    ]);
                }
                $updateData['password'] = Hash::make($request->new_password);
                $this->revokeUserTokens($user);
            }

            $user->update($updateData);

            $responseData = [
                'user' => $this->getUserData($user)
            ];

            // Include new token if password was updated
            if (isset($updateData['password'])) {
                $accessToken = $this->createAccessToken($user);
                $responseData['access_token'] = $accessToken;
                $responseData['token_type'] = 'Bearer';
                $responseData['expires_at'] = Carbon::now()->addMinutes(self::ACCESS_TOKEN_EXPIRATION)->toIso8601String();
            }

            return response()->json([
                'status' => 'success',
                'data' => $responseData,
                'message' => 'Profile updated successfully'
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (AuthenticationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 401);
        } catch (Exception $e) {
            Log::error('Profile update failed', [
                'error' => $e->getMessage(),
                'user_id' => $request->user()?->id
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update profile'
            ], 500);
        }
    }

    /**
     * Get authenticated user details
     */
    public function user(Request $request): JsonResponse
    {
        try {
            $user = $request->user();

            if (!$user) {
                throw new AuthenticationException('Unauthenticated');
            }

            // Get the current access token
            $currentToken = $user->currentAccessToken();
            $tokenExpiresAt = null;

            // Check token type and handle accordingly
            if ($currentToken instanceof PersonalAccessToken) {
                $tokenExpiresAt = $currentToken->expires_at ? $currentToken->expires_at->toIso8601String() : null;
            } elseif ($currentToken instanceof TransientToken) {
                // TransientToken doesn't have expires_at, calculate from session
                $tokenExpiresAt = Carbon::now()->addMinutes(self::ACCESS_TOKEN_EXPIRATION)->toIso8601String();
            } else {
                // Fallback for any other token type
                $tokenExpiresAt = Carbon::now()->addMinutes(self::ACCESS_TOKEN_EXPIRATION)->toIso8601String();
            }

            return response()->json([
                'status' => 'success',
                'data' => [
                    'user' => $this->getUserData($user),
                    'token_expires_at' => $tokenExpiresAt,
                    'token_type' => $currentToken ? get_class($currentToken) : 'unknown'
                ],
                'message' => 'User details retrieved successfully'
            ], 200);
        } catch (AuthenticationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 401);
        } catch (Exception $e) {
            Log::error('User details fetch failed', [
                'error' => $e->getMessage(),
                'user_id' => $request->user()?->id,
                'token_type' => $request->user()?->currentAccessToken() ? get_class($request->user()->currentAccessToken()) : 'none'
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve user details'
            ], 500);
        }
    }

    /**
     * Logout user and revoke tokens
     */
    public function logout(Request $request): JsonResponse
    {
        try {
            $user = $request->user();

            if (!$user) {
                throw new AuthenticationException('Unauthenticated');
            }

            Log::info('Logout attempt', [
                'user_id' => $user->id,
                'token_type' => $user->currentAccessToken() ? get_class($user->currentAccessToken()) : 'none'
            ]);

            // Handle different token types
            $currentToken = $user->currentAccessToken();

            if ($currentToken instanceof PersonalAccessToken) {
                // For PersonalAccessToken, we can delete it
                $currentToken->delete();
                Log::info('PersonalAccessToken deleted', ['user_id' => $user->id]);
            } elseif ($currentToken instanceof TransientToken) {
                // For TransientToken, we need to revoke all tokens via the user model
                // TransientToken doesn't have a delete method, so we revoke all user tokens
                $this->revokeUserTokens($user);
                Log::info('User tokens revoked via TransientToken logout', ['user_id' => $user->id]);
            } else {
                // Fallback: revoke all tokens
                $this->revokeUserTokens($user);
                Log::info('All user tokens revoked (fallback)', ['user_id' => $user->id]);
            }

            // For stateful requests, also invalidate the session
            if ($request->hasCookie(config('session.cookie'))) {
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Logged out successfully'
            ], 200);
        } catch (AuthenticationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 401);
        } catch (Exception $e) {
            Log::error('Logout failed', [
                'error' => $e->getMessage(),
                'user_id' => $request->user()?->id,
                'token_type' => $request->user()?->currentAccessToken() ? get_class($request->user()->currentAccessToken()) : 'none'
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to logout'
            ], 500);
        }
    }

    /**
     * Revoke all user tokens (only PersonalAccessTokens)
     */
    protected function revokeUserTokens(User $user): void
    {
        try {
            // This will only delete PersonalAccessTokens, not TransientTokens
            $user->tokens()->delete();
        } catch (Exception $e) {
            Log::warning('Failed to revoke some user tokens', [
                'user_id' => $user->id,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Create access token for user
     */
    protected function createAccessToken(User $user): string
    {
        return $user->createToken(
            'auth_token',
            ['*'],
            Carbon::now()->addMinutes(self::ACCESS_TOKEN_EXPIRATION)
        )->plainTextToken;
    }

    /**
     * Get user data for response
     */
    protected function getUserData(User $user): array
    {
        return [
            'id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'phone' => $user->phone,
            'created_at' => $user->created_at->toIso8601String(),
        ];
    }

    /**
     * Refresh the current access token
     */
    public function refresh(Request $request): JsonResponse
    {
        try {
            $user = $request->user();

            if (!$user) {
                throw new AuthenticationException('Unauthenticated');
            }

            $currentToken = $user->currentAccessToken();

            // Only refresh PersonalAccessTokens
            if ($currentToken instanceof PersonalAccessToken) {
                // Delete the current token
                $currentToken->delete();

                // Create a new token
                $accessToken = $this->createAccessToken($user);

                return response()->json([
                    'status' => 'success',
                    'data' => [
                        'access_token' => $accessToken,
                        'token_type' => 'Bearer',
                        'expires_at' => Carbon::now()->addMinutes(self::ACCESS_TOKEN_EXPIRATION)->toIso8601String(),
                        'user' => $this->getUserData($user)
                    ],
                    'message' => 'Token refreshed successfully'
                ], 200);
            } else {
                // For TransientTokens or other types, just return current user data
                return response()->json([
                    'status' => 'success',
                    'data' => [
                        'user' => $this->getUserData($user),
                        'message' => 'Session-based authentication - no token refresh needed'
                    ],
                    'message' => 'User authenticated'
                ], 200);
            }
        } catch (AuthenticationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 401);
        } catch (Exception $e) {
            Log::error('Token refresh failed', [
                'error' => $e->getMessage(),
                'user_id' => $request->user()?->id
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to refresh token'
            ], 500);
        }
    }
}
