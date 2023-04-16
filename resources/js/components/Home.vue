<template>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../../img/car1.webp" class="d-block w-100"  alt="Eladio Carrión">
      <div class="carousel-caption d-none d-md-block">
        <h5>Etiqueta de la primera diapositiva</h5>
        <p>Algún contenido placeholder representativo para la primera diapositiva.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../../img/car2.webp" class="d-block w-100"  alt="Rosalia">
      <div class="carousel-caption d-none d-md-block">
        <h5>Etiqueta de la segunda diapositiva</h5>
        <p>Algún contenido placeholder representativo para la segunda diapositiva.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../../img/car3.webp" class="d-block w-100"  alt="Bad Bunny">
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
<div class="container-fluid mt-5">
<h3>Artistas más escuchados</h3>

  <div class="row align-items-start">
    <div class="col-lg-4 mt-5 mb-5">
        <img src="../../img/quevedo.webp" class="d-block mx-auto " alt="Quevedo">
        <p class="text-center mt-2">Quevedo</p>
    </div>
    <div class="col-lg-4 mt-5 mb-5">
        <img src="../../img/badbunny.webp" class="d-block  mx-auto " alt="Bad Bunny">
        <p class="text-center mt-2">Bad Bunny</p>
    </div>
    <div class="col-lg-4 mt-5 mb-5">
        <img src="../../img/rosalia.webp" class="d-block  mx-auto" alt="Rosalia">
        <p class="text-center mt-2">Rosalia</p>
    </div>
</div>
</div>
<div class="container-fluid mt-5">
<h3>Merchandising más solicitado</h3>

  <div class="row align-items-start">
    <div class="col-lg-4 mt-5 mb-5">
        <img src="../../img/1.webp" class="d-block mx-auto " alt="Merchandising Bad Bunny">
        <p class="text-center mt-2">Bad Bunny</p>
    </div>
    <div class="col-lg-4 mt-5 mb-5">
        <img src="../../img/2.webp" class="d-block  mx-auto "  alt="Merchandising Rosalia">
        <p class="text-center mt-2">Rosalia</p>
    </div>
    <div class="col-lg-4 mt-5 mb-5">
        <img src="../../img/3.webp" class="d-block  mx-auto" alt="Merchandising Eladio Carrión">
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
