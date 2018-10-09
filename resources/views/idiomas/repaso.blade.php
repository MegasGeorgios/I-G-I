@extends('layouts.app')

@section('content')

<form method="GET" class="was-validated" action="{{ url('/idioma/'.$idioma.'/repaso') }}">
  <div class="row" >

    <div class="col-md-12 mb-3">
      <h3 style="text-align: center;">Ordenar por:</h3><br>
      <select name="value" class="custom-select center-block" style="width:150px; height:30px;">
        <option value="0">Todas</option>
        <option value="1">Aleatoreo</option>
        <option value="2">Solo {{$idioma}}</option>
        <option value="3">Solo español</option>
        <option value="20">Ultimas 20</option>
        <option value="60">Ultimas 60</option>
        <option value="100">Ultimas 100</option>
      </select>
    </div>
  </div>
  <button class="btn btn-primary center-block" style="width:150px;" type="submit">Filtrar</button>
</form>

<form action="{{ url('/idioma/'.$idioma.'/pdf') }}" method="get" style="padding-top: 10px; padding-bottom: 10px;">
  <button class="btn btn-primary center-block" style="width:150px;" type="submit">Exportar a PDF</button>
</form>

<div class="col-md-8 col-md-offset-2" id="vue">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">
          @if ($idioma == 'griego')
              Griego
          @elseif ($idioma == 'italiano')
              Italiano
          @else
              Ingles
          @endif
        </th>
        <th scope="col"></th>
        @if(isset($palabra->significado))
          <th scope="col">Español</th>
        @else
          <th scope="col">Practicar</th>
        @endif
      </tr>
    </thead>
    <tbody>
      <?php $i=1; ?>
      @foreach($palabras as $palabra)
      <tr>
        <th scope="row"><?php echo "$i";$i++; ?></th>
        <td>
          @if(isset($palabra->palabra))
            {{$palabra->palabra}}
          @else
            <a href="" data-toggle="modal" data-target="#exampleModal" v-on:click="asignAtributes({{$palabra->id}},'{{$idioma}}')">
              <i class="fa fa-pencil fa-fw" style="padding-left: 15px;" aria-hidden="true"></i>
            </a>
          @endif
        </td>
        <td></td>
        <td>
          @if(isset($palabra->significado))
            {{$palabra->significado}}
          @else
            <a href="" data-toggle="modal" data-target="#exampleModal" v-on:click="asignAtributes({{$palabra->id}},'{{$idioma}}')">
              <i class="fa fa-pencil fa-fw" style="padding-left: 15px;" aria-hidden="true"></i>
            </a>
          @endif
        </td>

      </tr>
      @endforeach

    </tbody>
  </table>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Introduzca la respuesta:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- <form method="POST" action="{{ url('/eliminar/palabra/') }}"> -->
            {{ csrf_field() }}
            <div class="form-group">
              <input type="text" class="form-control" name="significado" v-model="respuesta" placeholder="Ingresa la palabra" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" v-on:click="validarPalabra">
                <i class="fa fa-check"  aria-hidden="true"></i>
              </button>
            </div>
          <!-- </form> -->
        </div>
      </div>
    </div>
  </div>

</div>
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
var app = new Vue({
  el: '#vue',
  data: {
    id: 0,
    idioma: '',
    respuesta: ''
  },
  methods:{
    asignAtributes (id, idioma, tipo){
      this.id = id;
      this.idioma = idioma;
      this.tipo = tipo;
    },
    validarPalabra(){
      axios.post(`/validar/palabra`, {
        id: this.id,
        idioma: this.idioma,
        respuesta: this.respuesta,
      }).then(response => {
        alert(response.data.msj);
        this.respuesta = '';
        //location.reload();
      });
    }
  }
});
</script>
@endsection
