<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'tbusuario'; // Corrija o nome da tabela aqui

    protected $fillable = [
        'nome', 'usuario', 'senha', 'perfil',
    ];

    protected $hidden = [
        'senha', 'remember_token',
    ];
}
