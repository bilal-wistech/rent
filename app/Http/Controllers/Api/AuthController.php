<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessToken;
use Carbon\Carbon;
use Exception;

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

            // Revoke all existing tokens
            $user->tokens()->delete();

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

            // Check if it's a PersonalAccessToken (not TransientToken)
            if ($currentToken && $currentToken instanceof PersonalAccessToken) {
                $tokenExpiresAt = $currentToken->expires_at ? $currentToken->expires_at->toIso8601String() : null;
            } else {
                // For TransientToken or when expires_at is not available, calculate from creation time + expiration
                if ($currentToken && isset($currentToken->created_at)) {
                    $tokenExpiresAt = Carbon::parse($currentToken->created_at)
                        ->addMinutes(self::ACCESS_TOKEN_EXPIRATION)
                        ->toIso8601String();
                }
            }

            return response()->json([
                'status' => 'success',
                'data' => [
                    'user' => $this->getUserData($user),
                    'token_expires_at' => $tokenExpiresAt
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

            // Revoke current token only (or all tokens if you prefer)
            $currentToken = $user->currentAccessToken();
            if ($currentToken) {
                $currentToken->delete();
            }

            // Alternative: Revoke all tokens
            // $user->tokens()->delete();

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
                'user_id' => $request->user()?->id
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to logout'
            ], 500);
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
}
