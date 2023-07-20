<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// 
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Fortify\Contracts\TwoFactorAuthenticatable as TwoFactorAuthenticatableContract;


class User extends Authenticatable implements MustVerifyEmail, TwoFactorAuthenticatableContract
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin()
    {
        // Assuming you have an 'is_admin' column in your users table
        return $this->is_admin;
    }
}
