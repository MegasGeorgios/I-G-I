<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Recursos;

class RecursosController extends Controller
{
  /*
  * Mostrar todos los recursos de un idioma
  */
  public function recursos($idioma)
  {
    $galeria = Recursos::where('idioma',$idioma)->get();

    return view ('idiomas.recursos', compact('galeria'));
  }

  /*
  * Mostrar recursos por categoria e idioma
  */
  public function mostrar_recursos($id_categoria, $idioma)
  {
    //devolver solo imagenes, no pdf
    $galeria = Recursos::where('idioma',$idioma)->where('id_categoria',$id_categoria)->where('imagen', 'NOT LIKE', '%pdf')->get();

    return view ('idiomas.recursos', compact('galeria'));
  }

  /*
  * Almacenar recurso
  */
  public function guardar_recurso(Request $request)
  {
      $imagen = $request->file('archivo');
      //eliminar espacios del nombre del archivo.
      $ruta_archivo = str_replace(' ','',time().'_'.$imagen->getClientOriginalName());

      Storage::disk('imagenes')->put($ruta_archivo,file_get_contents($imagen->getRealPath() ) );

      $recurso= new Recursos();
      $recurso->idioma = $request->idioma;
      $recurso->descripcion = $request->descripcion;
      $recurso->imagen = $ruta_archivo;
      $recurso->id_categoria = $request->id_categoria;
      $recurso->save();

      return back()
            ->with('success','Se ha subido el archivo correctamente.');
  }

  /*
  * Descargar recurso
  */
  public function descargar_recurso($id_recurso)
  {
      $nombre_recurso = Recursos::find($id_recurso)->imagen;
      $directorio = Storage::disk('imagenes')->getAdapter()->getPathPrefix();
      $recurso = $directorio.$nombre_recurso;

      return response()->download($recurso);
  }

}
