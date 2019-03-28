<?php

namespace App\Http\Controllers;

use App\Dialogo;
use Illuminate\Http\Request;

class DialogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idioma)
    {
      if ($idioma == 'italiano') {
        $dialogos = Dialogo::where('idioma', 'italiano')->get();
      }elseif ($idioma == 'griego') {
        $dialogos = Dialogo::where('idioma', 'griego')->get();
      }elseif ($idioma == 'ingles') {
        $dialogos = Dialogo::where('idioma', 'ingles')->get();
      }

      $num_dialogos = count($dialogos);

     

      return view ('idiomas.dialogos', compact('dialogos','idioma','num_dialogos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idioma)
    {
      if(!empty($request->titulo))
        $titulo = $request->titulo;
      else
        $titulo = "Dialogo ".($request->numdialogo+1);

      $tabla = new Dialogo;
      $tabla->titulo = $titulo;
      $tabla->dialogo = $request->dialogo;
      $tabla->idioma = $idioma;
      $tabla->save();

      return back()->withInput();
    }
}
