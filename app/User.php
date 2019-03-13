<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function set_profile($email, $name, $phone) {
        $user = Auth::user();
        $profile = User::find($user->id);
        $profile->email = $email;
        $profile->name = $name;
        $profile->phone = $phone;
        $profile->save();
    }

    public static function repassword($password) {
        $user = Auth::user();
        $profile = User::find($user->id);
        $profile->password = $password;
        $profile->save();
        Auth::logout();
    }

}
