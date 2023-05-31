<template>
  <div class="container-fluid mt-5">
  <h3 class="mb-4">Artistas más escuchados</h3>
  <div class="row">
          <div class="col-md-4" v-for="(cancion_categoria, index) in canciones_categoria" :key="index">
              <div class="card mb-5">
                <router-link :to="{ name: 'canciones', params: { id_categoria: cancion_categoria.id } }" >
                  <img class="card-img-top3 image" v-bind:src="'/img/Artistas/' + cancion_categoria.image" alt="Portada de la canción">
                </router-link>
                  <div class="card-body d-flex justify-content-between">
                      <h5 class="card-title">{{ cancion_categoria.name }}</h5>
                      <router-link :to="{ name: 'canciones', params: { id_categoria: cancion_categoria.id } }" class="mx-2">
                        <div class="play" aria-label="play"></div>
                      </router-link>
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
             canciones_categoria: [],
             strSuccess: '',
             strError: ''
         }
     },
     created() {
         this.$axios.get('/sanctum/csrf-cookie').then(response => {
             this.$axios.get('/api/canciones_categoria') 
                 .then(response => {
                     this.canciones_categoria = response.data;
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

<style scoped>

</style>