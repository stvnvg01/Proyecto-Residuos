<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'empresa_recolectora'; // Apunta a la tabla existente

    protected $fillable = ['nombre'];

    // Cambiar el nombre del campo 'name' a 'nombre' para que coincida con la tabla
    public function getNameAttribute()
    {
        return $this->attributes['nombre'];
    }

    public function setNameAttribute($value)
    {
        $this->attributes['nombre'] = $value;
    }
}