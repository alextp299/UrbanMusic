<template>
    <div class="container-fluid mt-5 mb-5">
        <h3 class="mb-4">Merchandising</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card espaciado-foto mb-5 container">
                    <img src="../../img/Artistas/badbunny.webp" class="card-img-top3 image" alt="Merchandising Bad Bunny">
                    <div class="middle3">
                        <router-link to="/merchandising/BadBunny" class="nav-item nav-link mt-3"><button class="fondo-color tamaño_session">Entrar</button></router-link>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Bad Bunny</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card espaciado-foto mb-5 container">
                    <img src="../../img/Artistas/rosalia.webp" class="card-img-top3 image" alt="Merchandising Rosalia">
                    <div class="middle3">
                        <router-link to="/merchandising/Rosalia" class="nav-item nav-link mt-3"><button class="fondo-color tamaño_session">Entrar</button></router-link>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Rosalia</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card espaciado-foto mb-5 container">
                    <img src="../../img/Artistas/eladio.webp" class="card-img-top3 image" alt="Merchandising Eladio Carrión">
                    <div class="middle3">
                        <router-link to="/merchandising/EladioCarrion" class="nav-item nav-link mt-3"><button class="fondo-color tamaño_session">Entrar</button></router-link>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Eladio Carrión</h5>
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
 
 