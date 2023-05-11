<template>
  <div class="container-fluid mt-5">
  <h3 class="mb-4">Artistas más escuchados</h3>
  <div class="row">
    <div class="col-md-4">
      <div class="card espaciado-foto mb-5 container">
        <router-link to="/categoria/Quevedo"><img src="../../img/Artistas/quevedo.webp" class="card-img-top3 image" alt="Merchandising Quevedo"></router-link>
        <div class="card-body d-flex justify-content-between">
          <h5 class="card-title p-2">Quevedo</h5>
          <router-link to="/categoria/Quevedo"><div class="play" aria-label="play"></div></router-link>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card espaciado-foto mb-5 container">
        <router-link to="/categoria/BadBunny"><img src="../../img/Artistas/badbunny.webp" class="card-img-top3 image" alt="Merchandising Bad Bunny"></router-link>
        <div class="card-body d-flex justify-content-between">
          <h5 class="card-title p-2">Bad Bunny</h5>
          <router-link to="/categoria/BadBunny"><div class="play" aria-label="play"></div></router-link>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card espaciado-foto mb-5 container">
        <router-link to="/categoria/Shakira"><img src="../../img/Artistas/shakira.webp" class="card-img-top3 image" alt="Merchandising Shakira" style="height: 350px;"></router-link>
        <div class="card-body d-flex justify-content-between">
          <h5 class="card-title p-2">Shakira</h5>
          <router-link to="/categoria/Shakira"><div class="play" aria-label="play"></div></router-link>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card espaciado-foto mb-5 container">
        <router-link to="/categoria/Rosalia"><img src="../../img/Artistas/rosalia.webp" class="card-img-top3 image" alt="Merchandising Rosalia"></router-link>
        <div class="middle2">
        </div>
        <div class="card-body d-flex justify-content-between">
          <h5 class="card-title p-2">Rosalia</h5>
          <router-link to="/categoria/Rosalia"><div class="play" aria-label="play"></div></router-link>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card espaciado-foto mb-5 container">
        <router-link to="/categoria/EladioCarrion"><img src="../../img/Artistas/eladio.webp" class="card-img-top3 image" alt="Merchandising Eladio Carrión"></router-link>
        <div class="card-body d-flex justify-content-between">
          <h5 class="card-title p-2">Eladio Carrión</h5>
          <router-link to="/categoria/EladioCarrion"><div class="play" aria-label="play"></div></router-link>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card espaciado-foto mb-5 container">
        <router-link to="/categoria/KarolG"><img src="../../img/Artistas/karol.webp" class="card-img-top3 image" alt="Merchandising Karol G"></router-link>
        <div class="card-body d-flex justify-content-between">
          <h5 class="card-title p-2">Karol G</h5>
          <router-link to="/categoria/KarolG"><div class="play" aria-label="play"></div></router-link>
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