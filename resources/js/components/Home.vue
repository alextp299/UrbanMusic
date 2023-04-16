<template>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active container-carrusel">
      <img src="../../img/car1.webp" class="d-block w-100 image"  alt="Eladio Carrión">
      <div class="middle">
        <div class="text">John Doe</div>
      </div>
    </div>
    <div class="carousel-item container-carrusel">
      <img src="../../img/car2.webp" class="d-block w-100 image"  alt="Rosalia">
      <div class="middle">
        <div class="text">John Doe</div>
      </div>
    </div>
    <div class="carousel-item container-carrusel">
      <img src="../../img/car3.webp" class="d-block w-100 image"  alt="Bad Bunny">
      <div class="middle">
        <div class="text">John Doe</div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>
<div class="container-fluid mt-5">
<h3>Artistas más escuchados</h3>

  <div class="row align-items-start">
    <div class="col-lg-4 mt-5 mb-5 container">
        <img src="../../img/quevedo.webp" class="d-block mx-auto image" alt="Quevedo">
        <div class="middle2">
          <div class="play" aria-label="play"></div>
        </div>
        <p class="text-center mt-2">Quevedo</p>
    </div>
    <div class="col-lg-4 mt-5 mb-5 container">
        <img src="../../img/badbunny.webp" class="d-block  mx-auto image" alt="Bad Bunny">
        <div class="middle2">
          <div class="play" aria-label="play"></div>
        </div>
        <p class="text-center mt-2">Bad Bunny</p>
    </div>
    <div class="col-lg-4 mt-5 mb-5 container">
        <img src="../../img/rosalia.webp" class="d-block  mx-auto image" alt="Rosalia">
        <div class="middle2">
          <div class="play" aria-label="play"></div>
        </div>
        <p class="text-center mt-2">Rosalia</p>
    </div>
</div>
</div>
<div class="container-fluid mt-5">
<h3>Merchandising más solicitado</h3>

  <div class="row align-items-start">
    <div class="col-lg-4 mt-5 mb-5 container">
        <img src="../../img/1.webp" class="d-block mx-auto image" alt="Merchandising Bad Bunny">
        <div class="middle">
          <router-link to="/login" class="nav-item nav-link mt-3"><button class="fondo-color tamaño_session">Comprar</button></router-link>
        </div>
        <p class="text-center mt-2">Bad Bunny</p>
    </div>
    <div class="col-lg-4 mt-5 mb-5 container">
        <img src="../../img/2.webp" class="d-block  mx-auto image"  alt="Merchandising Rosalia">
        <div class="middle">
          <router-link to="/login" class="nav-item nav-link mt-3"><button class="fondo-color tamaño_session">Comprar</button></router-link>
        </div>
        <p class="text-center mt-2">Rosalia</p>
    </div>
    <div class="col-lg-4 mt-5 mb-5 container">
        <img src="../../img/3.webp" class="d-block  mx-auto image" alt="Merchandising Eladio Carrión">
        <div class="middle">
          <router-link to="/login" class="nav-item nav-link mt-3"><button class="fondo-color tamaño_session">Comprar</button></router-link>
        </div>
        <p class="text-center mt-2">Eladio Carrión</p>
    </div>
</div>
</div>
</template>

<script>
export default{
    name: "Home"
}
</script>

<style scoped>

</style>
