<template>
  <div class="container-fluid mt-5 mb-5">
    <h3 class="mb-4">Bad Bunny</h3>
    <div class="row">
        <div class="col-md-4" v-for="(cancion, index) in canciones" :key="index">
            <div class="card mb-5">
                <img class="card-img-top" v-bind:src="'/img/Music_Imagenes/' + cancion.image"  alt="Portada de la canción">
                <div class="card-body">
                    <h5 class="card-title">{{ cancion.name }}</h5>
                    <audio controls>
                    <source v-bind:src="'/audio/Music/' + cancion.audio" type="audio/mp3">
                    Tu navegador no soporta el elemento de audio.
                    </audio>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
   data() {
       return {
           canciones: [],
           strSuccess: '',
           strError: ''
       }
   },
   created() {
       this.$axios.get('/sanctum/csrf-cookie').then(response => {
           this.$axios.get('/api/Bad Bunny') 
               .then(response => {
                   this.canciones = response.data;
               })
               .catch(function (error) {
                   console.log(error);
               });
           }
       );
   },
   methods: {

   }
}
</script>