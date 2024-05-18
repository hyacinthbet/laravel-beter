<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_image',
        'first_name',
        'middle_name',
        'last_name',
        'suffix_name',
        'address',
        'birth_date',
        'gender_id',
        'contact_number',
        'email_address',
        'username',
        'password'
    ];
    protected $hidden = ['password'];
}