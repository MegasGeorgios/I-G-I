<?php

namespace App\Http\Controllers;

use App\categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categorias = categoria::all();
      $idioma = session('idioma');
      return view ('idiomas.index', compact('categorias','idioma'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Display the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria)
    {
      /*$idioma =session('idioma');

      if ($idioma=="Italiano") {
        return redirect()->action('ItalianController@show', ['categoria' => $categoria]);
      }
      if ($idioma=="Griego") {
        return redirect()->action('GriegoController@show', ['categoria' => $categoria]);
      }
      if ($idioma=="Ingles") {
        return redirect()->action('InglesController@show', ['categoria' => $categoria]);
      }*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(categoria $categoria)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      DB::table('categorias')->where('id', '=', $id)->delete();

      return back()->withInput();
    }
}
