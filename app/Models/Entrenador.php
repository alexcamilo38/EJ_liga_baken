<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    use HasFactory;

    //Relacion muchos a muchos
    public function disciplinas(){
        return $this->belongsToMany('App\Models\disciplina');
    }

     protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'cedula',
        'imagen_url',
        'imagen_public_id',
        
    ];
}
