<template>
  <div class="container-fluid mt-5 mb-5">
    <h3 class="mb-4">Canciones</h3>
    <div class="row">
      <div class="col-md-4" v-for="cancion in canciones" :key="cancion.id">
        <div class="card mb-5">
          <img class="card-img-top" :src="'/img/Music_Imagenes/' + cancion.image" alt="Portada de la canción">
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
  name: "Canciones",

  data() {
    return {
      canciones: [],
    };
  },

  mounted() {
    const id_categoria = this.$route.params.id_categoria;
    this.$axios
      .get(`/api/canciones_categoria/${id_categoria}`)
      .then((response) => {
        this.canciones = response.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>