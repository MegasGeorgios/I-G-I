<?php

namespace App\Http\Controllers;

use App\ingles;
use App\categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InglesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $idioma='Ingles';
      //session()->flush();
      session()->put('idioma', 'Ingles');

      return view ('idiomas.menu', compact('idioma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $idioma='Ingles';
      $ultimas5palabras=DB::table('ingles')->latest()->take(7)->get();
      $categorias = categoria::all();
      return view ('idiomas.create', compact('idioma','categorias','ultimas5palabras'));
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
      'palabra' => 'required',
      'significado' => 'required',
      ]);

      $task = new ingles;
      $task->palabra = $request->palabra;
      $task->significado = $request->significado;
      $task->id_categoria = $request->id_categoria;
      $task->save();

      return redirect()->route('ingles.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ingles  $ingles
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $palabras = DB::table('ingles')->where('id_categoria', '=', $id)->get();
      $idioma='Ingles';
      return view ('idiomas.show', compact('palabras','idioma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ingles  $ingles
     * @return \Illuminate\Http\Response
     */
    public function edit(ingles $ingles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ingles  $ingles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ingles $ingles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ingles  $ingles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      DB::table('ingles')->where('id_en', '=', $id)->delete();

      return back()->withInput();
    }
}
