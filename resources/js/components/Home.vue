<template>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../../img/Carrusel/car1.webp" class="d-block w-100 image"  alt="Eladio Carrión">
        <div class="carousel-caption d-none d-md-block" style="text-align: left; top: 33%;">
          <h4 class="text-dark">¡Descubre MÁS contenido de <br>artistas como Eladio Carrión <br>AQUÍ!</h4>
          <router-link to="/categoria" class="nav-item nav-link mt-2"><button class="fondo-color tamaño_session2">¡Dale!</button></router-link>
        </div>
    </div>
    <div class="carousel-item container-carrusel">
      <img src="../../img/Carrusel/car2.webp" class="d-block w-100 image"  alt="Rosalia">
        <div class="carousel-caption d-none d-md-block" style="text-align: right; top: 33%;">
          <h4 class="text-dark">¡Descubre MÁS contenido de <br>artistas como la Rosalia <br>AQUÍ!</h4>
          <router-link to="/categoria" class="nav-item nav-link mt-2"><button class="fondo-color tamaño_session2">¡Dale!</button></router-link>
        </div>
    </div>
    <div class="carousel-item container-carrusel">
      <img src="../../img/Carrusel/car3.webp" class="d-block w-100 image"  alt="Bad Bunny">
        <div class="carousel-caption d-none d-md-block" style="text-align: left; top: 33%;">
          <h4 class="text-dark">¡Descubre MÁS contenido <br>de artistas como <br>Bad Bunny AQUÍ!</h4>
          <router-link to="/categoria" class="nav-item nav-link mt-2"><button class="fondo-color tamaño_session2">¡Dale!</button></router-link>
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
        <img src="../../img/Artistas/shakira.webp" class="card-img-top3 image" alt="Merchandising Shakira">
        <div class="middle2">
          <router-link to="/categoria/Shakira"><div class="play" aria-label="play"></div></router-link>
        </div>
        <div class="card-body">
          <h5 class="card-title">Shakira</h5>
        </div>
      </div>
    </div>
    <hr>
    <div class="mb-5 justify-content-center">
      <router-link to="/categoria" class="nav-item nav-link mt-2 text-center"><button class="fondo-color tamaño_session3">Ver más</button></router-link>
    </div>
  </div>
  </div>
  <div class="container-fluid mt-5">
  <h3 class="mb-4">Merchandising más solicitado</h3>
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-5 container">
          <img src="../../img/Merchandising_BadBunny/1.webp" class="card-img-top2 image" alt="Merchandising Bad Bunny">
          <div class="middle4">
            <router-link to="/merchandising/BadBunny" class="nav-item nav-link mt-3"><button class="fondo-color tamaño_session">Entrar</button></router-link>
          </div>
          <div class="card-body">
            <h5 class="card-title">Bad Bunny</h5>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card espaciado-foto mb-5 container">
          <img src="../../img/Merchandising_Rosalia/2.webp" class="card-img-top2 image" alt="Merchandising Rosalia">
          <div class="middle4">
            <router-link to="/merchandising/Rosalia" class="nav-item nav-link mt-3"><button class="fondo-color tamaño_session">Entrar</button></router-link>
          </div>
          <div class="card-body">
            <h5 class="card-title">Rosalia</h5>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card espaciado-foto mb-5 container">
          <img src="../../img/Merchandising_EladioCarrion/3.webp" class="card-img-top2 image" alt="Merchandising Eladio Carrión">
          <div class="middle4">
            <router-link to="/merchandising/EladioCarrion" class="nav-item nav-link mt-3"><button class="fondo-color tamaño_session">Entrar</button></router-link>
          </div>
          <div class="card-body">
            <h5 class="card-title">Eladio Carrión</h5>
          </div>
        </div>
      </div>
      <hr>
      <div class="mb-5 justify-content-center">
        <router-link to="/merchandising" class="nav-item nav-link mt-2 text-center"><button class="fondo-color tamaño_session3">Ver más</button></router-link>
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
