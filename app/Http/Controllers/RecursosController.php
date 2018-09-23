<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Recursos;

class RecursosController extends Controller
{
  public function mostrar_recursos(Request $request)
  {
    //obteniendo todos los recursos de la BD
    $recursos= Recursos::orderBy('id', 'asc')->paginate(2);
    return response()->json([
      'pagination' => [
                'total'         => $recursos->total(),
                'current_page'  => $recursos->currentPage(),
                'per_page'      => $recursos->perPage(),
                'last_page'     => $recursos->lastPage(),
                'from'          => $recursos->firstItem(),
                'to'            => $recursos->lastItem(),
      ],
      'recursos'=>$recursos
    ]);
  }
  public function guardar_recurso(Request $request)
  {
    //validacion (Todos los input son requeridos)
    if (!$request->input('idioma') || !$request->get('image'))
    {
        return response()->json([
          'mensaje'=>'Datos invalidos o incompletos', 'status'=>'error'
        ]);
    }else {
      //obtenemos la imagen
      $imageData = $request->get('image');
      //asiganmos el nombre a la imagen
      $fileName = time(). '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
      //la almacenamos en el directorio /public/imagenes
      Storage::disk('imagenes')->put($fileName,file_get_contents($imageData) );
      //almacenamos en la BD los recursos
      $recurso= new Recursos;
      $recurso->idioma = $request->input('idioma');
      $recurso->descripcion = $request->input('descripcion');
      $recurso->imagen = $fileName;
      $recurso->save();
      
      return response()->json([
        'mensaje' => 'Se ha almacenado correctamente el recurso!',
        'status'=>'ok'
      ]);
    }
  }
}
