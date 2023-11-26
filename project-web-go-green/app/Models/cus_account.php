<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;

class cus_account extends Model implements Authenticatable
{
    use HasFactory, Notifiable, AuthenticatableTrait;

    protected $table = 'cus_accounts';

    protected $fillable = [
        'cus_name', 'cus_email', 'cus_password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
