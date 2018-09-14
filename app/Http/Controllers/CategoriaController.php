<?php

namespace App\Http\Controllers;

use App\Griego;
use App\Italiano;
use App\Ingles;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idioma)
    {
      if ($idioma == 'italiano') {
        $palabras = Italiano::orderBy('created_at', 'desc')->get();
      }elseif ($idioma == 'griego') {
        $palabras = Griego::orderBy('created_at', 'desc')->get();
      }elseif ($idioma == 'ingles') {
        $palabras = Ingles::orderBy('created_at', 'desc')->get();
      }

      if (count($palabras)>0)
      {
        $cat = $palabras->map(function ($u) {
            return $u->id_categoria;
        });

        $id_categorias = collect($cat)->unique();

        $categorias = Categoria::whereIn('id',$id_categorias)->select('id','nombre_categoria')->get();

      }else {
        $categorias = [];
      }

      return view ('idiomas.index', compact('categorias','idioma'));
    }

    /**
     * Almacenar categoria
     */
    public function store(Request $request)
    {
      $this->validate($request, [
      'nombre_categoria' => 'required'
      ]);

      $task = new categoria;
      $task->nombre_categoria = $request->nombre_categoria;
      $task->save();

      return back()->withInput();
    }

    /**
     * Mostrar palabras de una categoria de un idioma
     */
    public function show($idioma,$id)
    {
      if ($idioma == 'italiano') {
        $palabras = Italiano::where('id_categoria', '=', $id)->orderBy('created_at', 'desc')->get();
      }elseif ($idioma == 'griego') {
        $palabras = Griego::where('id_categoria', '=', $id)->orderBy('created_at', 'desc')->get();
      }elseif ($idioma == 'ingles') {
        $palabras = Ingles::where('id_categoria', '=', $id)->orderBy('created_at', 'desc')->get();
      }

      $categoria = Categoria::find($id);
      $nombre_categoria = $categoria->nombre_categoria;

      return view ('idiomas.show', compact('palabras','idioma','categoria'));
    }

    /**
     * Actualizar-editar una categoria
     */
    public function update(Request $request, $id)
    {
      if ($request->clave == config('password.psswd.pass')) {

          $categoria = Categoria::find($id);
          $categoria->nombre_categoria = $request->nombre_categoria;
          $categoria->save();

          return back()->withInput()->with('success','Se ha actualizado correctamente');
       }else {
         # code...
         return back()->withInput()->with('wrong','Clave incorrecta');
       }
    }


}
