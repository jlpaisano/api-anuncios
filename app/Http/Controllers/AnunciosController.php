<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;

class AnunciosController extends Controller
{
  
    //GET mostrar todos los registros
    public function index()
    {
        return Anuncio::all();
    }

    private function cargarArchivo($file)
    {
        $nombreArchivo = time() . '.' . $file->getClientOriginalExtension();
        $ruta = public_path();
        $file->move(public_path('images'), $nombreArchivo);
        return request()->getSchemeAndHttpHost() . "/images/" . $nombreArchivo;
    }

    //POST crear un registro
    public function store(CreateAnuncioRequest $request)
    {
        $input = $request->all();
         if($request->has('image'))
            $input['image'] = $this->cargarArchivo($request->image,);
        Anuncio::create($input);
        return response()->json([
            'res' => true,
            'message' => 'Registro creado con exito'
            ], 200);
    }

    //GET mostrar un registro
    public function show(Anuncio $anuncio)
    {
        return $anuncio;
    }

    //PUT actualizar un registro
    public function update(UpdateAnuncioRequest $request, Anuncio $anuncio)
    {
        $input = $request->all();
        if($request->has('image')){
            $input['image'] = $this->cargarArchivo($request->image);
        }
        $anuncio->update($input);
        return response()->json([
            'res' => true,
            'message' => 'Registro actualizado con exito'
        ], 200);        
    }

    //DELETE eliminar un registro
    public function destroy($id)
    {
        Anuncio::destroy($id);
        return response()->json([
            'res' => true,
            'message' => 'Registro eliminado con exito'
        ], 200);
    }
}
