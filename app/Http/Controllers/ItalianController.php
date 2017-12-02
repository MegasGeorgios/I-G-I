<?php

namespace App\Http\Controllers;

use App\italian;
use App\categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ItalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idioma='Italiano';
        //session()->flush();
        session()->put('idioma', 'Italiano');

        return view ('idiomas.menu', compact('idioma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $idioma='Italiano';
      $ultimas5palabras=DB::table('italians')->latest()->take(7)->get();
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

      $task = new italian;
      $task->palabra = $request->palabra;
      $task->significado = $request->significado;
      $task->id_categoria = $request->id_categoria;
      $task->save();

      return redirect()->route('italiano.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\italian  $italian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $palabras = DB::table('italians')->where('id_categoria', '=', $id)->get();
      $idioma='Italiano';
      return view ('idiomas.show', compact('palabras','idioma','id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\italian  $italian
     * @return \Illuminate\Http\Response
     */
    public function edit(italian $italian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\italian  $italian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $italian)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\italian  $italian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

      if ($request->clave == 'qwertyuiop') {
        # code...

         DB::table('italians')->where('id', '=', $id)->delete();

         return back()->withInput()->with('success','Se ha eliminado correctamente');
      }else {
        # code...
        return back()->withInput()->with('wrong','Clave incorrecta');
      }
    }

    public function repaso(Request $request)
    {
        $idioma='Italiano';
        $palabras = DB::table('italians')->latest()->get();

        if ($request->ordenar == 1) {
          $palabras = DB::table('italians')->latest()->take(20)->get();
        }

        if ($request->ordenar == 2) {
          $palabras = DB::table('italians')->latest()->take(60)->get();
        }

        if ($request->ordenar == 3) {
          $palabras = DB::table('italians')->latest()->take(100)->get();
        }

        return view ('idiomas.repaso', compact('idioma','palabras'));
    }

    public function buscar_it(Request $request)
    {
      $buscar=$request->buscar;
      $palabras= DB::table('italians')
      ->where('palabra','LIKE','%'.$buscar.'%')
      ->Orwhere('significado','LIKE','%'.$buscar.'%')->get();
      $idioma='Italiano';

      return view ('idiomas.show', compact('palabras','idioma'));

    }
}
