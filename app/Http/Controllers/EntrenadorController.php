<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class EntrenadorController extends Controller
{
    //
    public function index(){

        $entrenadors=Entrenador::all();

        return response()->json($entrenadors);


    }
    
    public function salida(Request $request){
       //si se le pone el  return Entrenador::create($request->all()); muestra los datos escritos
       // $derportistas = Entrenador::create($request->all());
       // return response()->json($derportistas);

       $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'cedula' => 'required|integer|unique:entrenadors,cedula',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $file = $request->file('imagen');

        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key' => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ],
            'url' => ['secure' => true],
        ]);

        $resultado = $cloudinary->uploadApi()->upload(
            $file->getRealPath(),
            [
                'folder' => 'entrenadores',
                'resource_type' => 'image',
            ]
        );

        $entrenador = Entrenador::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'cedula' => $request->cedula,
            'imagen_url' => $resultado['secure_url'],
            'imagen_public_id' => $resultado['public_id'],
        ]);

        return response()->json([
            'message' => 'Entrenador creada correctamente',
            'data' => $entrenador,
        ], 201);
        
    }



    public function show ($id){

     $entrenadors=Entrenador::find($id);
     return response()->json($entrenadors);
    
    }

    
     public function update(Request $request, Entrenador $entrenadors)
    {
    //metodo mas sencillo sin nesecidad de poner todo lo que pertenece a esa tabla
        $entrenadors->update($request->all());

        return response()->json($entrenadors);
    }
      //Destroy se encuentra el registro para luego eliminarlo..
    public function destroy(Entrenador $entrenadors)
    {
        $entrenadors->delete();
        return response()->json($entrenadors);
    }

}
