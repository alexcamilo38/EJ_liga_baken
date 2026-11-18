<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

      // Relacion Uno a Muchos
    public function deportista(){
        return $this->hasMany('App\Models\deportista');
    }

    //Relacion muchos a muchos
    public function entrenadors(){
        return $this->belongsToMany('App\Models\entrenador');
    }

     protected $fillable = [
        'codigo',
        'nombre',
        'descriocion',
       
    ];
}
