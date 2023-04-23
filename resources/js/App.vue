<template>
    <div class="fondo-web">
        <div class="container-s">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid pb-3">
                    <router-link to="/" class="nav-item text-color1 fs-5" style="font-family: twitch-logo;">URBAN <br>MUSICS</router-link>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" v-if="isLoggedin">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <router-link to="/categoria" class="nav-item nav-link mt-3 ms-5 fw-bold tamaño_letra">Categorias</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/topcanciones" class="nav-item nav-link mt-3 ms-5 fw-bold tamaño_letra">Top Canciones</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/merchandising" class="nav-item nav-link mt-3 ms-5 fw-bold tamaño_letra">Merchandising Artistas</router-link>
                            </li>
                        </ul>
                        <router-link to="/carrito" class="nav-item nav-link mt-3 me-2"><div class="carrito_hover1" aria-label="Carrito"></div></router-link>
                        <router-link to="/" class="nav-item nav-link mt-3 me-3"><button class="fondo-color tamaño_session" @click="logout">Logout</button></router-link>
                    </div> 
                    <div class="collapse navbar-collapse" id="navbarSupportedContent"  v-else>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <router-link to="/categoria" class="nav-item nav-link mt-3 ms-5 fw-bold tamaño_letra">Categorias</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/topcanciones" class="nav-item nav-link mt-3 ms-5 fw-bold tamaño_letra">Top Canciones</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/merchandising" class="nav-item nav-link mt-3 ms-5 fw-bold tamaño_letra">Merchandising Artistas</router-link>
                            </li>
                        </ul>
                        <router-link to="/login" class="nav-item nav-link mt-3 me-3"><button class="fondo-color tamaño_session">Iniciar Sesión</button></router-link>
                        <router-link to="/register" class="nav-item nav-link mt-3 me-3"><button class="fondo-color tamaño_session">Registrarse</button></router-link>
                        <p class="mt-4 mx-3">Productos en el carrito: {{ productos.length }}</p>
                        <router-link to="/carrito" class="nav-item nav-link mt-3 me-2"><div class="carrito_hover1" aria-label="Carrito"></div></router-link>
                    </div>
                </div>
                </nav>
            </header>
        
            <router-view></router-view>

            <footer>
                <nav class="navbar-light bg-light">
                <div class="container-fluid row mb-4 ocultar_div">
                    <div class="col-lg-4 col-md-4 mb-md-0">
                        <router-link to="/politica_de_privacidad" class="nav-item nav-link conf_priv mt-3 fw-bold tamaño_letra">Política de Privacidad</router-link>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-md-0">
                        <router-link to="/politica_de_cookies" class="nav-item nav-link conf_cookies mt-3 fw-bold tamaño_letra">Política de Cookies</router-link>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-md-0">
                        <router-link to="/aviso_legal" class="nav-item nav-link conf_avis mt-3 fw-bold tamaño_letra">Aviso Legal</router-link>
                    </div>
                </div>
                <!-- Section: Social media -->
                <div class="container-fluid mb-4 text-center">
                    <!-- Instagram -->
                    <a class="btn btn-link btn-floating btn-lg mx-2" href="https://www.instagram.com/" target="_blank">
                        <div class="redes_hover1" aria-label="Instagram"></div>
                    </a>
                    <!-- Facebook -->
                    <a class="btn btn-link btn-floating btn-lg mx-2" href="https://es-es.facebook.com/" target="_blank">
                        <div class="redes_hover2" aria-label="Facebook"></div>
                    </a>
                    <!-- Twitter -->
                    <a class="btn btn-link btn-floating btn-lg mx-2" href="https://twitter.com/?lang=ES" target="_blank">
                        <div class="redes_hover3" aria-label="Twitter"></div>
                    </a>
                    <!-- YouTube -->
                    <a class="btn btn-link btn-floating btn-lg me-3" href="https://www.youtube.com/" target="_blank">
                        <div class="redes_hover4" aria-label="YouTube"></div>
                    </a>
                </div>
                <!-- Copyright -->
                <div class="text-center texto p-1">
                    <p class="texto">Copyright &copy; 2023 URBAN MUSIC Todos los derechos reservados</p>
                </div>
                </nav>
            </footer>
        </div>
    </div>
</template>
 <script>
 export default {
    name: "App",
    data() {
        return {
            isLoggedin: false,
            productos: [],
           strSuccess: '',
           strError: ''
        }
    },
    created() {
        if(window.Laravel.isLoggedin){
            this.isLoggedin =true;
        }
    },created() {
       this.$axios.get('/sanctum/csrf-cookie').then(response => {
        axios.get('/api/carrito')
    .then(response => {
        // Maneja la respuesta de la API
        this.productos = Array.from(response.data);
        console.log(this.productos);
    })
    .catch(error => {
        // Maneja los errores de la solicitud HTTP
        console.log(error);
    });
           }
       );
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