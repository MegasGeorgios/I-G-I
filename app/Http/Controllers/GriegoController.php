<?php

namespace App\Http\Controllers;

use App\griego;
use App\categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GriegoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $idioma='Griego';
      //session()->flush();
      session()->put('idioma', 'Griego');

      return view ('idiomas.menu', compact('idioma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $idioma='Griego';
      $ultimas5palabras=DB::table('griegos')->latest()->take(7)->get();
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

      $task = new griego;
      $task->palabra = $request->palabra;
      $task->significado = $request->significado;
      $task->id_categoria = $request->id_categoria;
      $task->save();

      return redirect()->route('griego.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\griego  $griego
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $palabras = DB::table('griegos')->where('id_categoria', '=', $id)->get();
      $idioma='Griego';
      return view ('idiomas.show', compact('palabras','idioma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\griego  $griego
     * @return \Illuminate\Http\Response
     */
    public function edit(griego $griego)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\griego  $griego
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, griego $griego)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\griego  $griego
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      if ($request->clave == 'qwertyuiop') {
        # code...

         DB::table('griegos')->where('id', '=', $id)->delete();

         return back()->withInput()->with('success','Se ha eliminado correctamente');
      }else {
        # code...
        return back()->withInput()->with('wrong','Clave incorrecta');
      }
    }

    public function repaso(Request $request)
    {
        $idioma='Griego';
        $palabras = DB::table('griegos')->latest()->get();

        if ($request->ordenar == 1) {
          $palabras = DB::table('griegos')->latest()->take(20)->get();
        }

        if ($request->ordenar == 2) {
          $palabras = DB::table('griegos')->latest()->take(60)->get();
        }

        if ($request->ordenar == 3) {
          $palabras = DB::table('griegos')->latest()->take(100)->get();
        }

        return view ('idiomas.repaso', compact('idioma','palabras'));
    }

    public function buscar_gr(Request $request)
    {
      $buscar=$request->buscar;
      $palabras= DB::table('griegos')
      ->where('palabra','LIKE','%'.$buscar.'%')
      ->Orwhere('significado','LIKE','%'.$buscar.'%')->get();
      $idioma='Griego';

      return view ('idiomas.show', compact('palabras','idioma'));

    }
}
