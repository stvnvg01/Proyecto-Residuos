<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'apellidos',
        'correo',
        'telefono',
        'password',
        'departamento',
        'municipio',
        'direccion',
        'rol',
        'puntos',
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = true;

    // Usar 'correo' en lugar de 'email' para autenticación
    public function getAuthIdentifierName()
    {
        return 'correo';
    }
}