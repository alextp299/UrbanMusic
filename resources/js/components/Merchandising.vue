<template>
    <div class="container-fluid mt-5 mb-5">
        <h3 class="mb-4">Merchandising</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card espaciado-foto mb-5 container">
                    <router-link to="/merchandising/BadBunny"><img src="../../img/Artistas/badbunny.webp" class="card-img-top3 image" alt="Merchandising Bad Bunny"></router-link>
                    <div class="card-body d-flex justify-content-between">
                        <h5 class="card-title p-2">Bad Bunny</h5>
                        <router-link to="/merchandising/BadBunny" class="nav-item nav-link"><button class="fondo-color tamaño_session mt-1">Acceder</button></router-link>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card espaciado-foto mb-5 container">
                    <router-link to="/merchandising/Rosalia"><img src="../../img/Artistas/rosalia.webp" class="card-img-top3 image" alt="Merchandising Rosalia"></router-link>
                    <div class="card-body d-flex justify-content-between">
                        <h5 class="card-title p-2">Rosalia</h5>
                        <router-link to="/merchandising/Rosalia" class="nav-item nav-link"><button class="fondo-color tamaño_session mt-1">Acceder</button></router-link>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card espaciado-foto mb-5 container">
                    <router-link to="/merchandising/EladioCarrion"><img src="../../img/Artistas/eladio.webp" class="card-img-top3 image" alt="Merchandising Eladio Carrión"></router-link>
                    <div class="card-body d-flex justify-content-between">
                        <h5 class="card-title p-2">Eladio Carrión</h5>
                        <router-link to="/merchandising/EladioCarrion" class="nav-item nav-link"><button class="fondo-color tamaño_session mt-1">Acceder</button></router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
  
 
 <script>
 export default {
    name: "Merchandising"
 }
 
 
 </script>
 
 