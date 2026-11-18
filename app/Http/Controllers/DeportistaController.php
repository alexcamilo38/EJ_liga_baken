<?php

namespace App\Http\Controllers;

use App\Models\Deportista;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class DeportistaController extends Controller
{
    //
    public function index(){

        $derportistas=Deportista::all();

        return response()->json($derportistas);
    }

    
    public function salida(Request $request){
       //si se le pone el  return Deportista::create($request->all()); muestra los datos escritos
       // $derportistas = Deportista::create($request->all());
       // return response()->json($derportistas);

       $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'expediente' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'disciplina_id' => 'nullable|integer|min:1',
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
                'folder' => 'derportistas',
                'resource_type' => 'image',
            ]
        );

        $derportista = Deportista::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'expediente' => $request->expediente,
            'imagen_url' => $resultado['secure_url'],
            'imagen_public_id' => $resultado['public_id'],
            'disciplina_id' => $request->disciplina_id,
        ]);

        return response()->json([
            'message' => 'Deportista creada correctamente',
            'data' => $derportista,
        ], 201);
        
    }


    public function show ($id){

     $derportistas=Deportista::find($id);
     return response()->json($derportistas);
    

    }


     public function update(Request $request, Deportista $derportistas)
    {
    //metodo mas sencillo sin nesecidad de poner todo lo que pertenece a esa tabla
        $derportistas->update($request->all());

        return response()->json($derportistas);
    }
      //Destroy se encuentra el registro para luego eliminarlo..
    public function destroy(Deportista $derportistas)
    {
        $derportistas->delete();
        return response()->json($derportistas);
    }


}

