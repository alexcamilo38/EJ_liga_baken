<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    //
    public function index(){

        $disciplinas=Disciplina::all();

        return response()->json($disciplinas);


    }
    
    public function salida(Request $request){
       //si se le pone el  return Disciplina::create($request->all()); muestra los datos escritos
        $disciplinas = Disciplina::create($request->all());
        return response()->json($disciplinas);
        
    }



    public function show ($id){

     $disciplinas=Disciplina::find($id);
     return response()->json($disciplinas);
    
    }

    
     public function update(Request $request, Disciplina $disciplinas)
    {
    //metodo mas sencillo sin nesecidad de poner todo lo que pertenece a esa tabla
        $disciplinas->update($request->all());

        return response()->json($disciplinas);
    }
      //Destroy se encuentra el registro para luego eliminarlo..
    public function destroy(Disciplina $disciplinas)
    {
        $disciplinas->delete();
        return response()->json($disciplinas);
    }
}
