<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deportista extends Model
{
    use HasFactory;

     //Relacion Uno a Muchos (Inversa) 
    public function disciplina(){
        return $this->belongsTo('App\Models\disciplina');
    }

     protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'expediente',
        'imagen_url',
        'imagen_public_id',
        'disciplina_id',
       
    ];


     
}
