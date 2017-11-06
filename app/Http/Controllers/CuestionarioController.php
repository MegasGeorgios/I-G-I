<?php

namespace App\Http\Controllers;

use App\cuestionario;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CuestionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $idioma= session('idioma');
      $apuntes = DB::table('cuestionarios')->where('idioma', '=', $idioma)->get();
      return view ('idiomas.apuntes', compact('apuntes','idioma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $task = new cuestionario;
      if (isset($request->frase)) {
        $task->frase = $request->frase;
      }
      if (isset($request->sig_frase)) {
        $task->sig_frase = $request->sig_frase;
      }
      $task->idioma = $request->idioma;
      $task->save();

      return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cuestionario  $cuestionario
     * @return \Illuminate\Http\Response
     */
    public function show(cuestionario $cuestionario)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cuestionario  $cuestionario
     * @return \Illuminate\Http\Response
     */
    public function edit(cuestionario $cuestionario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cuestionario  $cuestionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cuestionario $cuestionario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cuestionario  $cuestionario
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request, $id)
     {

       if ($request->clave == 'qwertyuiop') {
         # code...

          DB::table('cuestionarios')->where('id', '=', $id)->delete();

          return back()->withInput()->with('success','Se ha eliminado correctamente');
       }else {
         # code...
         return back()->withInput()->with('wrong','Clave incorrecta');
       }
     }
}
