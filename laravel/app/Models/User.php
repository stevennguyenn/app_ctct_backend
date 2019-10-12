<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $table = 'users';

    public $fillable = [ 'id' , 'name' , 'avatar' , 'email', 'password', 'access_token'];

    public $hidden = ['password', 'updated_at', 'created_at', 'remember_token', 'remember_token'];

    /**
     * @param Token $accessToken
     */

    /**
     * @param Token $accessToken
     */
}
