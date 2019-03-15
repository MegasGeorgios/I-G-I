<?php

namespace App\Http\Controllers;

use App\Griego;
use App\Italiano;
use App\Ingles;
use App\Categoria;
use App\Notas;
use App\Tablas;
use App\Recursos;
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

      $cat = new categoria;
      $cat->nombre_categoria = $request->nombre_categoria;
      $cat->save();

      return back()->withInput();
    }

    /**
     * Almacenar nota
     */
    public function storeNote(Request $request)
    {
      $this->validate($request, [
      'nota' => 'required',
      'id_categoria' => 'required'
      ]);

      $table = new Notas;
      $table->nota = $request->nota;
      $table->id_categoria = $request->id_categoria;
      $table->save();

      return back()->withInput();
    }

    /**
     * Almacenar tabla
     */
    public function storeTable(Request $request)
    {
      $this->validate($request, [
      'filas' => 'required',
      'columnas' => 'required',
      'id_categoria' => 'required'
      ]);

      $table = new Tablas;
      if (isset($request->titulo)) {
        $table->titulo = $request->titulo;
      }
      $table->filas = $request->filas;
      $table->columnas = $request->columnas;
      $table->datos = $datos;
      $table->id_categoria = $request->id_categoria;
      $table->save();

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
      $notas = Notas::where('id_categoria',$id)->get();
      $tablas = Tablas::where('id_categoria',$id)->get();
      $recursos = Recursos::where('id_categoria',$id)->where('imagen','like','%.pdf%')->get();

      return view ('idiomas.show', compact('palabras','idioma','categoria','notas','recursos', 'tablas'));
    }

    /**
     * Actualizar-editar una categoria
     */
    public function update(Request $request, $id)
    {
      if ($request->clave == config('password.psswd.pass')) {

          $categoria = Categoria::find($id);
          $categoria->nombre_categoria = $request->nombre_categoria;
          $categoria->url_clase = $request->url_clase;
          $categoria->save();

          return back()->withInput()->with('success','Se ha actualizado correctamente');
       }else {
         # code...
         return back()->withInput()->with('wrong','Clave incorrecta');
       }
    }


}
