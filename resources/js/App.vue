<template>
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
      <div class="container-fluid pb-3">
        <router-link to="/" class="nav-item nav-link text-color1 fs-5" style="font-family: twitch-logo;">URBAN <br>MUSIC</router-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" v-if="isLoggedin">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <router-link to="/dashboard" class="nav-item nav-link mt-3 ms-5 fw-bold">Categorias</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/dashboard" class="nav-item nav-link mt-3 ms-5 fw-bold">Top Canciones</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/posts" class="nav-item nav-link mt-3 ms-5 fw-bold">Merchandising Artistas</router-link>
            </li>
          </ul>
          <form class="d-flex">
            <a class="nav-item nav-link" style="cursor: pointer;" @click="logout">Logout</a>
          </form>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent"  v-else>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <router-link to="/dashboard" class="nav-item nav-link  mt-3 ms-5 fw-bold">Categorias</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/dashboard" class="nav-item nav-link  mt-3 ms-5 fw-bold">Top Canciones</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/posts" class="nav-item nav-link  mt-3 ms-5 fw-bold">Merchandising Artistas</router-link>
                </li>
            </ul>
            <router-link to="/login" class="nav-item nav-link mt-3 me-5"><button class="fondo-color fw-bold">Iniciar Sesión</button></router-link>
            <router-link to="/register" class="nav-item nav-link mt-3 me-5"><button class="fondo-color fw-bold">Registrarse</button></router-link>
        </div>
      </div>
    </nav> 
    
    <router-view></router-view>

    <div class="container p-3 ocultar_div">
        <div class="row mb-4">
            <div class="col-lg-4 col-md-4 mb-md-0">
                <p class="mb-0"><a class="nav-link conf_priv" aria-current="page" href="#">Política de Privacidad</a></p>
                <router-link to="/dashboard" class="nav-item nav-link  mt-3 ms-5 fw-bold">Categorias</router-link>
            </div>
            <div class="col-lg-4 col-md-4 mb-md-0">
                <p class="mb-0"><a class="nav-link conf_cookies" aria-current="page" href="#">Política de Cookies</a></p>
            </div>
            <div class="col-lg-4 col-md-4 mb-md-0">
                <p class="mb-0"><a class="nav-link conf_avis" aria-current="page" href="">Aviso Legal</a></p>
            </div>
        </div>
    </div>
    <!-- Section: Social media -->
    <div class="container pt-4 mb-4">
        <!-- Instagram -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.instagram.com/" target="_blank">
            <img src="../icons/instagram.svg" alt="instagram">
        </a>
        <!-- Facebook -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://es-es.facebook.com/" target="_blank">
            <img src="../icons/facebook.svg" alt="facebook">
        </a>
        <!-- Twitter -->
        <a class="btn btn-link btn-floating btn-lg m-1" href="https://twitter.com/?lang=ES" target="_blank">
            <img src="../icons/twitter.svg" alt="twitter">
        </a>
        <!-- YouTube -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.youtube.com/" target="_blank">
            <img src="../icons/youtube.svg" alt="linkedin">
        </a>
    </div>
    <!-- Copyright -->
    <div class="text-center texto p-1">
        <p class="texto">Copyright &copy; 2022 URBAN FOOD Todos los derechos reservados</p>
    </div>
    </div>
    </template>
 <script>
 export default {
    name: "App",
    data() {
        return {
            isLoggedin: false,
        }
    },
    created() {
        if(window.Laravel.isLoggedin){
            this.isLoggedin =true;
        }
    },
    methods: {
        logout(e) {
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('api/logout')
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = "/"
                        } else {
                            console.log(response);
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
 
 
        }
    },
 }
 </script> 