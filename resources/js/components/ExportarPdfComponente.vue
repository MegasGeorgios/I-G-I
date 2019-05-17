<template>
  <div style="padding-top: 10px; padding-bottom: 10px;">
      <button type="button" class="btn btn-primary center-block" style="width:150px;" @click="exportarPDF()">Exportar todas a PDF</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'ExportarPdfComponente',

    props: {
      idioma: {
        type: String,
        required: true,
      },
    },

    methods: {
      exportarPDF: function() {
        var url = '/idioma/'+this.idioma+'/pdf';
        axios.get(url).then(function (response) {
          console.log(response);
        });
      }
    }
}
</script>
