<?php

namespace App\Http\Controllers;

use App\Griego;
use App\Italiano;
use App\Ingles;
use App\Categoria;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    /**
     * Asignar el idioma seleccionado a la var de session
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idioma)
    {
      return view ('idiomas.menu', compact('idioma'));
    }

    /**
     * Vista agregar vocabulario
     *
     * @return \Illuminate\Http\Response
     */
    public function add_word($idioma)
    {
      if ($idioma == 'italiano') {
        $palabras = Italiano::orderBy('created_at', 'desc')->get();
      }elseif ($idioma == 'griego') {
        $palabras = Griego::orderBy('created_at', 'desc')->get();
      }elseif ($idioma == 'ingles') {
        $palabras = Ingles::orderBy('created_at', 'desc')->get();
      }

      $nombre_categorias = Categoria::all();
      $ultimas_palabras = collect($palabras)->take(10);

      return view ('idiomas.create', [
        'idioma' => $idioma,
        'nombre_categorias' => $nombre_categorias,
        'ultimas_palabras' => $ultimas_palabras
      ]);
    }

    /**
     * Almacenar palabra
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'idioma' => 'required',
        'palabra' => 'required',
        'significado' => 'required',
      ]);

      if ($request->idioma == 'griego') {
        $table = new Griego;
        $table->palabra = trim($request->palabra);

      }elseif ($request->idioma == 'italiano') {
        $table = new Italiano;
      }else {
        $table = new Ingles;
      }

      if ($request->idioma != 'griego') {
        $table->palabra = trim(strtolower($request->palabra));
      }

      $table->significado = trim(strtolower($request->significado));
      $table->id_categoria = $request->id_categoria;
      $table->save();

      return $this->add_word($request->idioma);
    }

    /**
     * Eliminar palabra
     */
    public function destroy(Request $request)
    {
      if ($request->clave == config('password.psswd.pass')) {

        if ($idioma == 'italiano' || $idioma == 'griego') {
          $tabla = $idioma.'s';
        }else {
          $tabla = 'ingles';
        }

        DB::table($tabla)->where('id', '=', $id)->delete();

        return back()->withInput()->with('success','Se ha eliminado correctamente');
      }else {
        # code...
        return back()->withInput()->with('wrong','Clave incorrecta');
      }
    }

    public function repaso(Request $request, $idioma)
    {
      if ($idioma == 'italiano' || $idioma == 'griego') {
        $tabla = $idioma.'s';
      }else {
        $tabla = 'ingles';
      }

      if ($request->value > 0) {
        $palabras = DB::table($tabla)->latest()->take($request->value)->get();
      }elseif ($request->value < 0) {
        $palabras = DB::table($tabla)->inRandomOrder()->get();
      }else {
        $palabras = DB::table($tabla)->latest()->get();
      }

      return view ('idiomas.repaso', compact('idioma','palabras'));
    }

    public function search(Request $request, $idioma)
    {
      $buscar = $request->palabra;
      $buscar = trim($buscar);
      $buscar = str_replace(' ','',$buscar);
      $buscar = strtolower($buscar);

      if ($idioma == 'italiano' || $idioma == 'griego') {
        $tabla = $idioma.'s';
      }else {
        $tabla = 'ingles';
      }

      $palabras= DB::table($tabla)
      ->where('palabra','LIKE','%'.$buscar.'%')
      ->Orwhere('significado','LIKE','%'.$buscar.'%')->get();

      return view ('idiomas.show', compact('palabras','idioma'));

    }

    public function export_pdf($idioma)
    {
      if ($idioma == 'griego') {
        $palabras = Griego::all();
      }elseif ($idioma == 'italiano') {
        $palabras = Italiano::all();
      }else {
        $palabras = Ingles::all();
      }

      $data = [
        'idioma' => $idioma,
        'palabras' => $palabras
      ];

      $pdf = PDF::loadView('pdf', $data);
      return $pdf->download('repasoidioma.pdf');
    }
}
