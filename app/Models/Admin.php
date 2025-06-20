<?php

/**
 * Admin Model
 *
 * Admin Model manages Admin operation.
 *
 * @category   Admin
 * @package    vRent
 * @author     Techvillage Dev Team
 * @copyright  2020 Techvillage
 * @license
 * @version    2.7
 * @link       http://techvill.net
 * @since      Version 1.3
 * @deprecated None
 */

namespace App\Models;

use DB;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Admin extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword,Notifiable;

    protected $table    = 'admin';

    protected $fillable = ['username', 'email', 'password'];

    protected $hidden   = ['password', 'remember_token'];

    public function getProfileSrcAttribute()
    {
        if ($this->attributes['profile_image'] == '') {
            $src = asset('images/user_pic.jpg');
        } else {
            $src = url('images/profile/'.$this->attributes['id'].'/'.$this->attributes['profile_image']);
        }

        return $src;
    }
}
