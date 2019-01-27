
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#vue',
  data: {
    id: 0,
    idioma: '',
    clave: '',
    respuesta: ''
  },
  methods:{
    asignAtributesShow (id, idioma){
      this.id = id;
      this.idioma = idioma;
    },
    asignAtributes (id, idioma, tipo){
      this.id = id;
      this.idioma = idioma;
      this.tipo = tipo;
    },
    borrar(){
      // console.log([this.id, this.idioma, this.clave]);
      axios.post(`/eliminar/palabra`, {
        id: this.id,
        idioma: this.idioma,
        clave: this.clave,
      }).then(response => {
        alert(response.data.msj);
        location.reload();
      });
    },
    resaltarPalabra(id, idioma){
      // console.log([this.id, this.idioma, this.clave]);
      axios.get(`/favorita/`+id+`/`+idioma).then(response => {
        if(response.data.status == 1){
          document.getElementById("resaltarfila-"+id).style.backgroundColor='#B8F9AA';
        }else {
          document.getElementById("resaltarfila-"+id).style.backgroundColor='#f5f8fa';
        }
        //location.reload();
      });
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
