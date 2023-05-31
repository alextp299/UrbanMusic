<template>
    <div class="container-fluid mt-5 mb-5">
        <h3 class="mb-4">Merchandising</h3>
        <div class="row">
          <div class="col-md-4" v-for="(categoria, index) in categorias" :key="index">
              <div class="card mb-5">
                <router-link :to="{ name: 'productos', params: { id_categoria: categoria.id } }" >
                  <img class="card-img-top3 image" v-bind:src="'/img/Artistas/' + categoria.image" alt="Portada de la canción">
                </router-link>
                  <div class="card-body d-flex justify-content-between">
                      <h5 class="card-title">{{ categoria.name }}</h5>
                      <router-link :to="{ name: 'productos', params: { id_categoria: categoria.id } }" class="mx-2">
                        <button class="fondo-color tamaño_session mt-1">Acceder</button>
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
           categorias: [],
           strSuccess: '',
           strError: ''
       }
   },
   created() {
       this.$axios.get('/sanctum/csrf-cookie').then(response => {
           this.$axios.get('/api/productos_categoria') 
               .then(response => {
                   this.categorias = response.data;
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
 
 