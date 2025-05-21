<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canje extends Model
{
    use HasFactory;

    protected $table = 'canjes';

    protected $fillable = ['user_id', 'recompensa_id', 'puntos_usados'];

    public function user()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }

    public function recompensa()
    {
        return $this->belongsTo(Recompensa::class, 'recompensa_id');
    }
}