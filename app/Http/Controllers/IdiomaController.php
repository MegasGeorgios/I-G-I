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
      $table->slug = str_replace(' ','',strtolower($request->palabra)).str_replace(' ','',strtolower($request->significado));
      $table->save();

      return $this->add_word($request->idioma);
    }

    /**
     * Eliminar palabra
     */
    public function destroy(Request $request)
    {
      if ($request->clave == config('password.psswd.pass')) {

        if ($request->idioma == 'italiano' || $request->idioma == 'griego') {
          $tabla = $request->idioma.'s';
        }else {
          $tabla = 'ingles';
        }

        DB::table($tabla)->where('id', '=', $request->id)->delete();

        // return back()->withInput()->with('success','Se ha eliminado correctamente');
        return ['msj' => 'Se ha eliminado correctamente'];
      }else {
        return ['msj' =>'Clave incorrecta'];
        // return back()->withInput()->with('wrong','Clave incorrecta');
      }
    }

    /**
     * Repasar vocabulario, filtrar palabras
     */
    public function repaso(Request $request, $idioma)
    {
      if ($idioma == 'italiano' || $idioma == 'griego') {
        $tabla = $idioma.'s';
      }else {
        $tabla = 'ingles';
      }

      if ($request->value == 1) {
        $palabras = DB::table($tabla)->inRandomOrder()->get();
      }elseif ($request->value == 2) {
        $palabras = DB::table($tabla)->select('id','palabra')->get();
      }elseif ($request->value == 3) {
        $palabras = DB::table($tabla)->select('id','significado')->get();
      }elseif (in_array($request->value,['20','60','100'])) {
        $palabras = DB::table($tabla)->latest()->take($request->value)->get();
      }else {
        $palabras = DB::table($tabla)->latest()->get();
      }

      return view ('idiomas.repaso', compact('idioma','palabras'));
    }

    /**
     * Practicar vocabulario
     */
    public function validar_palabra(Request $request)
    {
      if ( $request->respuesta != '' && $request->idioma != '' && $request->id > 0 ){

        if ($request->idioma == 'italiano' || $request->idioma == 'griego') {
          $tabla = $request->idioma.'s';
        }else {
          $tabla = 'ingles';
        }

        $palabra = DB::table($tabla)->where('id', '=', $request->id)->first();

        if (($request->respuesta == $palabra->significado) || ($request->respuesta == $palabra->palabra)) {
          return response()->json(['msj' => 'Acertaste!']);
        }else {
          return response()->json(['msj' =>'Respuesta incorrecta']);
        }
      }else {
        return response()->json(['msj' =>'Datos incompletos']);
      }
    }

    /**
     * Buscar palabras
     */
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
      ->where('slug','LIKE','%'.$buscar.'%')->get();
      // ->Orwhere('significado','LIKE','%'.$buscar.'%')->get();

      return view ('idiomas.show', compact('palabras','idioma'));

    }

    /**
     * Exportar a PDF
     */
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

    /**
     * Interseccion de idiomas
     */
    public function intersection()
    {
      // $griego = Griego::select('palabra','significado')->get();
      // $italiano = Italiano::select('palabra','significado')->get();
      // $ingles = Ingles::select('palabra','significado')->get();
      $griego = collect(Griego::pluck('significado')->all());
      $italiano = collect(Italiano::pluck('significado')->all());
      $ingles = collect(Ingles::pluck('significado')->all());
      // $grouped = $collection->mapToGroups(function ($item, $key) {
      //     return [$item['department'] => $item['name']];
      // });
      //Intersectamos los idiomas
      $intersect = $griego->intersect($italiano);//->intersect($ingles);
      // Griego::find($intersect->keys()[0]);
      dd($intersect);

    }

    /**
     * Encontrar y eliminar palabras repetidas
     */
    public function repeat_words($idioma)
    {
      if ($idioma == 'griego') {
        $palabras = Griego::all();
      }elseif ($idioma == 'italiano') {
        $palabras = Italiano::all();
      }else {
        $palabras = Ingles::all();
      }

      $palabras = $palabras->map(function ($p) use($palabras){
          $count = 0;
          foreach ($palabras as $key => $pa) {
            if ($p->slug == $pa->slug) {
              $count++;
            }
          }
          if ($count > 1) {
            return $p;
          }
      })->reject(function ($value) {
          return empty($value);
      });

      $palabras = $palabras->map(function ($p){
          $p->nomb_cat = Categoria::find($p->id_categoria)->nombre_categoria;
          return $p;
      });

      $categoria = NULL;
      $repetidas = true;

      return view ('idiomas.show', compact('palabras','idioma','categoria','repetidas'));

    }
}
