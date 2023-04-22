<template>
  <div class="container-fluid mt-5 mb-5">
    <h3 class="mb-4">Shakira</h3>
    
    <table class="table table-hover table-sm">
        <thead class="bg-dark text-light">
            <tr>
                <th width="50" class="text-center">#</th>
                <th>Nombre</th>
                <th>Audio</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(cancion, index) in canciones" :key="index">
                <td class="text-center">{{ cancion.id }}</td>
                <td>{{ cancion.name }}</td>
                <td>
                    <div v-if="cancion.audio">
                        <audio controls>
                            <source v-bind:src="'/audio/Shakira/' + cancion.audio" type="audio/mp3">
                            Tu navegador no soporta el elemento de audio.
                        </audio>
                    </div>
                </td>
                <td class="text-center">
                        <div v-if="cancion.image">
                            <img alt="post-img" width="100" v-bind:src="'/img/Music_Shakira/' + cancion.image">
                        </div>
                    </td>
            </tr>
        </tbody>
    </table>
  </div>
</template>
<template>
    <div class="container-fluid mt-5 mb-5">
      <h3 class="mb-4">Eladio Carrión</h3>
      <div class="row">
        <div class="col-md-4" v-for="(cancion, index) in canciones" :key="index">
          <div class="card mb-5">
            <img class="card-img-top" v-bind:src="'/img/Music_Shakira/' + cancion.image" alt="Portada de la canción">
            <div class="card-body">
              <h5 class="card-title">{{ cancion.name }}</h5>
              <audio controls class="mb-3">
                <source v-bind:src="'/audio/Shakira/' + cancion.audio" type="audio/mp3">
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
           this.$axios.get('/api/Shakira') 
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