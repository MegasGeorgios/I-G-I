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
      $ultima_cat = $nombre_categorias->last();
      $ultimas_palabras = collect($palabras)->take(10);

      return view ('idiomas.create', [
        'idioma' => $idioma,
        'ultima_cat' => $ultima_cat,
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
     public function vista_repaso(Request $request, $idioma)
     {
       return view ('idiomas.repaso', compact('idioma'));

     }
    public function repaso(Request $request, $idioma)
    {
      if ($idioma == 'italiano' || $idioma == 'griego') {
        $tabla = $idioma.'s';
      }else {
        $tabla = 'ingles';
      }

      if ($request->value == 1) {
        $palabras = DB::table($tabla)->inRandomOrder()->paginate();
      }elseif ($request->value == 2) {
        $palabras = DB::table($tabla)->where('favorita',1)->inRandomOrder()->paginate();
      }elseif (in_array($request->value,['20','60','100'])) {
        /*  Dado que los metodos take y limit para obtener solo el numero de palabras requidas
        *   no funcionan con el metodo paginate, se devolvera el numero de palabras requeridas
        *   en una sola pagina.
        */
        $palabras = DB::table($tabla)->orderBy('id', 'desc')->paginate($request->value);

        return response()->json([
          'pagination' => [
                    'total'         => $request->value,
                    'current_page'  => 1,
                    'per_page'      => $request->value,
                    'last_page'     => 1,
                    'from'          => $request->value,
                    'to'            => $request->value,
          ],
          'palabras'=>$palabras
        ]);

      }else {
        $palabras = DB::table($tabla)->orderBy('id', 'desc')->paginate();
      }

      return response()->json([
        'pagination' => [
                  'total'         => $palabras->total(),
                  'current_page'  => $palabras->currentPage(),
                  'per_page'      => $palabras->perPage(),
                  'last_page'     => $palabras->lastPage(),
                  'from'          => $palabras->firstItem(),
                  'to'            => $palabras->lastItem(),
        ],
        'palabras'=>$palabras
      ]);
    }

    /*
    * Retorna vista practicar
    */
    public function practicar(Request $request, $idioma)
    {
      if ($idioma == 'italiano' || $idioma == 'griego') {
        $tabla = $idioma.'s';
      }else {
        $tabla = 'ingles';
      }

      if (isset($request->value)) {
        $selected = $request->value;
      }else {
        // Solo griego por defecto
        $selected = 2;
      }

      $categorias = Categoria::all();
      $palabras = DB::table($tabla);

      if ($request->value == 3) {
        $palabras = $palabras->select('id','significado')->inRandomOrder();
      }else {
        $palabras = $palabras->select('id','palabra')->inRandomOrder();
      }

      $palabras = $palabras->get();

      return view ('idiomas.practicar', compact('palabras','idioma', 'selected'));
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

        $significado = str_replace(' ', '', $this->eliminar_tildes($palabra->significado));
        $respuesta = str_replace(' ', '', $this->eliminar_tildes($request->respuesta));

        if ($respuesta == $significado) {
          return response()->json(['msj' => 'Acertaste!', 'status' => 'ok']);
        }elseif ($request->respuesta == $palabra->palabra) {
          return response()->json(['msj' => 'Acertaste!', 'status' => 'ok']);
        }else {
          return response()->json(['msj' =>'Respuesta incorrecta', 'status' => 'nook']);
        }
      }else {
        return response()->json(['msj' =>'Datos incompletos']);
      }
    }

    public function eliminar_tildes($cadena){

        //Ahora reemplazamos las letras
        $cadena = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $cadena
        );

        $cadena = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $cadena );

        $cadena = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $cadena );

        $cadena = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $cadena );

        $cadena = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $cadena );

        $cadena = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C'),
            $cadena
        );

        return $cadena;
    }

    /**
     * Marcar/resaltar una palabra
     */
    public function favorita($id, $idioma)
    {
      if ($idioma == 'italiano') {
        $palabra = Italiano::find($id);
      }elseif ($idioma == 'griego') {
        $palabra = Griego::find($id);
      }elseif ($idioma == 'ingles') {
        $palabra = Ingles::find($id);
      }

      // si la palabra no esta resaltada entonces resaltar si no desresaltar
      if ($palabra->favorita == 0) {
        $palabra->favorita = 1;
        $pintar = 1;
      }else {
        $palabra->favorita = 0;
        $pintar = 0;
      }
      $palabra->save();

      return response()->json(['status' => $pintar]);

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
    public function export_pdf($idioma, $cat_id=NULL)
    {
      if ($idioma == 'griego') {
        if (!is_null($cat_id)) {
          $palabras = Griego::where('id_categoria',$cat_id)->get();
        }else {
          $palabras = Griego::all();
        }
      }elseif ($idioma == 'italiano') {
        if (!is_null($cat_id)) {
          $palabras = Italiano::where('id_categoria',$cat_id)->get();
        }else {
          $palabras = Italiano::all();
        }
      }else {
        if (!is_null($cat_id)) {
          $palabras = Ingles::where('id_categoria',$cat_id)->get();
        }else {
          $palabras = Ingles::all();
        }
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

    /**
     * Agregar vocabulario desde archivo de texto
     */
    public function agg_vocabulario_archivo(Request $request, $idioma)
    {

    }

}
