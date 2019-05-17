<template>
  <div>
    <div>
      <div class="row" >
        <div class="col-md-12 mb-3">
          <h3 style="text-align: center;">Ordenar por:</h3><br>
          <select v-model="value" name="value" class="custom-select center-block" style="width:150px; height:30px;" v-on:change="obtenerPalabras()">
            <option value="0">Todas</option>
            <option value="1">Aleatoreo</option>
            <option value="2">Favoritas</option>
            <option value="20">Ultimas 20</option>
            <option value="60">Ultimas 60</option>
            <option value="100">Ultimas 100</option>
          </select>
        </div>
      </div>
      <!-- <exportar-pdf-componente idioma="this.idioma"></exportar-pdf-componente> -->
    </div>

    <div class="col-md-8 col-md-offset-2">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col" v-if="this.idioma == 'griego'">Griego</th>
            <th scope="col" v-else-if="this.idioma == 'italiano'">Italiano</th>
            <th scope="col" v-else>Ingles</th>
            <th scope="col">Español</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(palabra, index) in palabras">
            <th scope="row" v-text="index+1"></th>
            <td v-text="palabra.palabra"></td>
            <td v-text="palabra.significado"></td>
          </tr>
        </tbody>
      </table>
      <nav>
        <ul class="pagination">
          <li v-if="pagination.current_page > 1">
            <a href="#" @click.prevent="cambiarPagina(pagination.current_page - 1)">
              <span>Anterior</span>
            </a>
          </li>

          <li v-if="pagination.current_page < pagination.last_page">
            <a href="#" @click.prevent="cambiarPagina(pagination.current_page + 1)">
              <span>Página {{pagination.current_page}} de {{pagination.last_page}}</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

//importar el componente hijo
// import ExportarPdfComponente from './ExportarPdfComponente.vue';

export default {

  name: 'RepasoComponente',

  //declarar los componentes hijos a usar en este componente
  // components: {
  //   ExportarPdfComponente
  // },

  props: {
    idioma: {
      type: String,
      required: true,
    },
  },

    data(){
      return{
        palabras:[],
        value: 0,
        pagination: {
    			'total': 0,
          'current_page': 0,
          'per_page': 0,
          'last_page': 0,
          'from': 0,
          'to': 0
    		},
        offset: 2,
    		errors: []
      }
    },

    computed: {
  		isActived: function() {
  			return this.pagination.current_page;
  		},
  		pagesNumber: function() {
  			if(!this.pagination.to){
  				return [];
  			}
  			var from = this.pagination.current_page - this.offset;
  			if(from < 1){
  				from = 1;
  			}
  			var to = from + (this.offset * 2);
  			if(to >= this.pagination.last_page){
  				to = this.pagination.last_page;
  			}
  			var pagesArray = [];
  			while(from <= to){
  				pagesArray.push(from);
  				from++;
  			}
  			return pagesArray;
  		}
  	},

    created: function() {
      this.obtenerPalabras();
    },

    methods: {
      obtenerPalabras: function(page) {
        var url = '/idioma/'+this.idioma+'/repaso/vue?page='+page;
        axios.post(url, {
          value: this.value,
        }).then(response => {
          this.palabras = response.data.palabras.data;
          this.pagination = response.data.pagination;
        });
      },
      cambiarPagina: function(page) {
        this.pagination.current_page = page;
        this.obtenerPalabras(page);
      }
    }
}
</script>
