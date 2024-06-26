<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nome', 'cpf', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
