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
    public function destroy(Request $request, $id)
    {
      if ($request->clave == 'qwertyuiop') {
        # code...

         DB::table('ingles')->where('id', '=', $id)->delete();

         return back()->withInput()->with('success','Se ha eliminado correctamente');
      }else {
        # code...
        return back()->withInput()->with('wrong','Clave incorrecta');
      }
    }

    public function repaso(Request $request)
    {
        $idioma='Ingles';
        $palabras = DB::table('ingles')->latest()->get();

        if ($request->ordenar == 1) {
          $palabras = DB::table('ingles')->latest()->take(20)->get();
        }

        if ($request->ordenar == 2) {
          $palabras = DB::table('ingles')->latest()->take(60)->get();
        }

        if ($request->ordenar == 3) {
          $palabras = DB::table('ingles')->latest()->take(100)->get();
        }

        return view ('idiomas.repaso', compact('idioma','palabras'));
    }

    public function buscar_in(Request $request)
    {
      $buscar=$request->buscar;
      $buscar=trim($buscar);
      $buscar=str_replace(' ','',$buscar);
      $palabras= DB::table('ingles')
      ->where('palabra','LIKE','%'.$buscar.'%')
      ->Orwhere('significado','LIKE','%'.$buscar.'%')->get();
      $idioma='Ingles';

      return view ('idiomas.show', compact('palabras','idioma'));

    }
}
