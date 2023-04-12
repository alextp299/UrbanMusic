<template>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../../img/car1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Etiqueta de la primera diapositiva</h5>
        <p>Algún contenido placeholder representativo para la primera diapositiva.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../../img/car2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Etiqueta de la segunda diapositiva</h5>
        <p>Algún contenido placeholder representativo para la segunda diapositiva.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../../img/car3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Etiqueta de la tercera diapositiva</h5>
        <p>Algún contenido placeholder representativo para la tercera diapositiva.</p>
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
<div class="container mt-5">
<h2>Artistas más escuchados</h2>

  <div class="row align-items-start">
    <div class="col-lg-4 mt-5 mb-5">
        <img src="../../img/quevedo.jpg" class="d-block mx-auto " alt="...">
        <p class="text-center mt-2">Quevedo</p>
    </div>
    <div class="col-lg-4 mt-5 mb-5">
        <img src="../../img/badbunny.jpg" class="d-block  mx-auto " alt="...">
        <p class="text-center mt-2">Bad Bunny</p>
    </div>
    <div class="col-lg-4 mt-5 mb-5">
        <img src="../../img/shakira.jpg" class="d-block  mx-auto" alt="...">
        <p class="text-center mt-2">Shakira</p>
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
