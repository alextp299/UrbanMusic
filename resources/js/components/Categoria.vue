<template>
  <div class="container-fluid mt-5">
  <h3 class="mb-4">Artistas más escuchados</h3>
  <div class="row">
    <div class="col-md-4">
      <div class="card espaciado-foto mb-5 container">
        <img src="../../img/Artistas/quevedo.webp" class="card-img-top3 image" alt="Merchandising Quevedo">
        <div class="middle2">
          <router-link to="/categoria/Quevedo"><div class="play" aria-label="play"></div></router-link>
        </div>
        <div class="card-body">
          <h5 class="card-title">Quevedo</h5>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card espaciado-foto mb-5 container">
        <img src="../../img/Artistas/badbunny.webp" class="card-img-top3 image" alt="Merchandising Bad Bunny">
        <div class="middle2">
          <router-link to="/categoria/BadBunny"><div class="play" aria-label="play"></div></router-link>
        </div>
        <div class="card-body">
          <h5 class="card-title">Bad Bunny</h5>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card espaciado-foto mb-5 container">
        <img src="../../img/Artistas/shakira.webp" class="card-img-top3 image" alt="Merchandising Shakira" style="height: 350px;">
        <div class="middle2">
          <router-link to="/categoria/Shakira"><div class="play" aria-label="play"></div></router-link>
        </div>
        <div class="card-body">
          <h5 class="card-title">Shakira</h5>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card espaciado-foto mb-5 container">
        <img src="../../img/Artistas/rosalia.webp" class="card-img-top3 image" alt="Merchandising Rosalia">
        <div class="middle2">
          <router-link to="/categoria/Rosalia"><div class="play" aria-label="play"></div></router-link>
        </div>
        <div class="card-body">
          <h5 class="card-title">Rosalia</h5>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card espaciado-foto mb-5 container">
        <img src="../../img/Artistas/eladio.webp" class="card-img-top3 image" alt="Merchandising Eladio Carrión">
        <div class="middle2">
          <router-link to="/categoria/EladioCarrion"><div class="play" aria-label="play"></div></router-link>
        </div>
        <div class="card-body">
          <h5 class="card-title">Eladio Carrión</h5>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card espaciado-foto mb-5 container">
        <img src="../../img/Artistas/karol.webp" class="card-img-top3 image" alt="Merchandising Karol G">
        <div class="middle2">
          <router-link to="/categoria/KarolG"><div class="play" aria-label="play"></div></router-link>
        </div>
        <div class="card-body">
          <h5 class="card-title">Karol G</h5>
        </div>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
export default{
    name: "Categoria"
}
</script>

<style scoped>

</style>