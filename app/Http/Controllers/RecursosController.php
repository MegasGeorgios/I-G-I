<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Recursos;

class RecursosController extends Controller
{
  public function mostrar_recursos($id_categoria, $idioma)
  {
    $galeria = Recursos::where('idioma',$idioma)->where('id_categoria',$id_categoria)->get();

    return view ('idiomas.recursos', compact('galeria'));
  }
  public function guardar_recurso(Request $request)
  {
      $imagen = $request->file('imagen');
      $ruta_archivo = time().'_'.$imagen->getClientOriginalName();

      Storage::disk('imagenes')->put($ruta_archivo,file_get_contents($imagen->getRealPath() ) );

      $recurso= new Recursos();
      $recurso->idioma = $request->idioma;
      $recurso->descripcion = $request->descripcion;
      $recurso->imagen = $ruta_archivo;
      $recurso->id_categoria = $request->id_categoria;
      $recurso->save();

      return back()
            ->with('success','Se ha subido la imagen correctamente.');
  }
}
