<template>
  <div class="container-fluid mt-5 mb-5">
    <h3 class="mb-4">Top Canciones</h3>
    <div class="row align-items-start">
      <div class="col-lg-4 mt-5 mb-5 container">
          <img src="../../img/quevedo.webp" class="d-block mx-auto image" alt="Quevedo">
          <div class="middle2">
            <router-link to="/categoria/Quevedo"><div class="play" aria-label="play"></div></router-link>
          </div>
          <p class="text-center mt-2">Quevedo</p>
      </div>
      <div class="col-lg-4 mt-5 mb-5 container">
          <img src="../../img/badbunny.webp" class="d-block  mx-auto image" alt="Bad Bunny">
          <div class="middle2">
            <router-link to="/categoria/BadBunny"><div class="play" aria-label="play"></div></router-link>
          </div>
          <p class="text-center mt-2">Bad Bunny</p>
      </div>
      <div class="col-lg-4 mt-5 mb-5 container">
          <img src="../../img/shakira.webp" class="d-block  mx-auto image" alt="Shakira">
          <div class="middle2">
            <router-link to="/categoria/Shakira"><div class="play" aria-label="play"></div></router-link>
          </div>
          <p class="text-center mt-2">Shakira</p>
      </div>
    </div>
  </div>
  <div class="container-fluid mt-5">
    <div class="row align-items-start">
      <div class="col-lg-4 mt-5 mb-5 container">
          <img src="../../img/rosalia.webp" class="d-block mx-auto image" alt="Rosalia">
          <div class="middle2">
            <router-link to="/categoria/Rosalia"><div class="play" aria-label="play"></div></router-link>
          </div>
          <p class="text-center mt-2">Rosalia</p>
      </div>
      <div class="col-lg-4 mt-5 mb-5 container">
          <img src="../../img/eladio.webp" class="d-block  mx-auto image" alt="Eladio Carrión">
          <div class="middle2">
            <router-link to="/categoria/EladioCarrion"><div class="play" aria-label="play"></div></router-link>
          </div>
          <p class="text-center mt-2">Eladio Carrión</p>
      </div>
      <div class="col-lg-4 mt-5 mb-5 container">
          <img src="../../img/karol.webp" class="d-block  mx-auto image" alt="Karol G">
          <div class="middle2">
            <router-link to="/categoria/KarolG"><div class="play" aria-label="play"></div></router-link>
          </div>
          <p class="text-center mt-2">Karol G</p>
      </div>
    </div>
  </div>
</template>

<script>
export default{
    name: "TopCanciones"
}
</script>

<style scoped>

</style>