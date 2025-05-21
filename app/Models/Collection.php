<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $table = 'recolecciones'; // Apunta a la tabla existente

    protected $fillable = [
        'user_id',
        'empresa_id',
        'tipo_residuo_id',
        'fecha',
        'programada',
        'turno',
        'peso_kg',
    ];

    // Cambiar los nombres de los campos para que coincidan con la tabla
    public function getDateAttribute()
    {
        return $this->attributes['fecha'];
    }

    public function setDateAttribute($value)
    {
        $this->attributes['fecha'] = $value;
    }

    public function getWeightKgAttribute()
    {
        return $this->attributes['peso_kg'];
    }

    public function setWeightKgAttribute($value)
    {
        $this->attributes['peso_kg'] = $value;
    }

    public function getShiftAttribute()
    {
        return $this->attributes['turno'];
    }

    public function setShiftAttribute($value)
    {
        $this->attributes['turno'] = $value;
    }

    public function user()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'empresa_id');
    }

    public function wasteType()
    {
        return $this->belongsTo(WasteType::class, 'tipo_residuo_id');
    }
}