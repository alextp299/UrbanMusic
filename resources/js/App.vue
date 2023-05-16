<template>
    <div class="fondo-web">
        <div class="container-s">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid pb-3 margenes-header-footer3 margenes-header-footer2">
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
                                <router-link to="/merchandising" class="nav-item nav-link mt-3 ms-5 fw-bold tamaño_letra">Merchandising Artistas</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/contacto" class="nav-item nav-link mt-3 ms-5 fw-bold tamaño_letra">Contacto</router-link>
                            </li>
                        </ul>
                        <div class="dropdown mt-3 me-1">
                            <button class="fondo-color-perfil tamaño_session dropdtoggleown despegable" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="position: relative;">
                                Mi Perfil
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="width: 100%; height: auto; padding: 0;">
                                <li>
                                    <p class="mt-1 ms-3">¡Hola {{ user.name }}!</p>
                                </li>
                                <li class="divider">
                                    <hr>    
                                </li>
                                <li class="nav-item">
                                    <router-link to="/miperfil" class="nav-item nav-link mt-1 ms-3 fw-bold tamaño_letra">Ver Mi Perfil</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admincanciones" class="nav-item nav-link mt-1 ms-3 fw-bold tamaño_letra" v-if="hasUserRole('accederAdmin')">Administrador Canciones</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/adminproductos" class="nav-item nav-link mt-1 ms-3 fw-bold tamaño_letra" v-if="hasUserRole('accederAdmin')">Administrador Productos</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/adminusers" class="nav-item nav-link mt-1 ms-3 fw-bold tamaño_letra" v-if="hasUserRole('accederUserAdmin')">Administrador Usuarios</router-link>
                                </li>
                                <li class="nav-item fondo-color-logout">
                                    <router-link to="/" class="nav-item nav-link mt-1 ms-3 tamaño_session4" @click="logout">Logout</router-link>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown mt-3 me-1">
                            <button class="fondo-color-perfil tamaño_session dropdtoggleown despegable2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="position: relative;">
                                Mi Perfil
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="width: 220px; position: absolute; left: -90px; height: auto; padding: 0;">
                                <li>
                                    <p class="mt-3 ms-3" style="margin-right: 5px;">¡Hola {{ user.name }}!</p>
                                </li>
                                <li class="divider">
                                    <hr>    
                                </li>
                                <li class="nav-item">
                                    <router-link to="/miperfil" class="nav-item nav-link mt-1 ms-3 fw-bold tamaño_letra">Ver Mi Perfil</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admincanciones" class="nav-item nav-link mt-1 ms-3 mb-2 fw-bold tamaño_letra" v-if="hasUserRole('accederAdmin')">Administrador Canciones</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/adminproductos" class="nav-item nav-link mt-1 ms-3 mb-2 fw-bold tamaño_letra" v-if="hasUserRole('accederAdmin')">Administrador Productos</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/adminusers" class="nav-item nav-link mt-1 ms-3 mb-2 fw-bold tamaño_letra" v-if="hasUserRole('accederUserAdmin')">Administrador Usuarios</router-link>
                                </li>
                                <li class="nav-item fondo-color-logout">
                                    <router-link to="/" class="nav-item nav-link mt-1 ms-3 tamaño_session4" @click="logout">Logout</router-link>
                                </li>
                            </ul>
                        </div>
                        <router-link to="/carrito" class="nav-item nav-link mt-3 me-2">
                            <div class="carrito_hover1 ms-2" aria-label="Carrito" style="position: relative;">
                                <span class="badge rounded-circle" id="cart_menu_num" >{{ productos.length }}</span>
                            </div>
                        </router-link>
                    </div> 
                    <div class="collapse navbar-collapse" id="navbarSupportedContent"  v-else>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <router-link to="/categoria" class="nav-item nav-link mt-3 ms-5 fw-bold tamaño_letra">Categorias</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/merchandising" class="nav-item nav-link mt-3 ms-5 fw-bold tamaño_letra">Merchandising Artistas</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/contacto" class="nav-item nav-link mt-3 ms-5 fw-bold tamaño_letra">Contacto</router-link>
                            </li>
                        </ul>
                        <router-link to="/login" class="nav-item nav-link mt-3 me-3"><button class="fondo-color tamaño_session">Iniciar Sesión</button></router-link>
                        <router-link to="/register" class="nav-item nav-link mt-3 me-3"><button class="fondo-color tamaño_session">Registrarse</button></router-link>
                        
                    </div>
                </div>
                </nav>
            </header>
        
            <router-view class="margenes"></router-view>

            <footer>
                <nav class="navbar-light bg-light">
                <div class="container-fluid row mb-4 ocultar_div margenes-header-footer">
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
                    <a class="btn btn-link btn-floating btn-lg mx-2 margen-superior-footer-redes" href="https://www.instagram.com/" target="_blank">
                        <div class="redes_hover1" aria-label="Instagram"></div>
                    </a>
                    <!-- Facebook -->
                    <a class="btn btn-link btn-floating btn-lg mx-2 margen-superior-footer-redes" href="https://es-es.facebook.com/" target="_blank">
                        <div class="redes_hover2" aria-label="Facebook"></div>
                    </a>
                    <!-- Twitter -->
                    <a class="btn btn-link btn-floating btn-lg mx-2 margen-superior-footer-redes" href="https://twitter.com/?lang=ES" target="_blank">
                        <div class="redes_hover3" aria-label="Twitter"></div>
                    </a>
                    <!-- YouTube -->
                    <a class="btn btn-link btn-floating btn-lg me-3 margen-superior-footer-redes" href="https://www.youtube.com/" target="_blank">
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
            user: null,
            productos: [],
           strSuccess: '',
           strError: ''
        }
    },
    created() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/carrito')
                .then(response => {
                    this.productos = response.data;
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
            })

        if(window.Laravel.isLoggedin){
            this.isLoggedin =true;
            this.user =window.Laravel.user;
        }
    },
    methods: {
        
        logout(e) {
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/logout')
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
 
 
        },hasUserRole(role) {
    if (this.user && this.user.roles) {
      return this.user.roles.some(userRole => userRole.rol === role);
    }
    return false;
  },
}
    }

 </script> 