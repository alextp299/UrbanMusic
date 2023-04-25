<template>
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <div v-if="error !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>{{error}}</strong>
                </div>

                <div class="card card-default d-flex px-5 py-5">
                    <div class="card-body p-1 text-center"><h5>¡Inicia Sesión!</h5></div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="email" class="col-sm-12 col-form-label text-md-right">Correo Electrónico</label>
                                    <input id="email" type="email" class="form-control" v-model="email" required
                                           autofocus autocomplete="off" placeholder="Ingrese su Correo">
                            </div>


                            <div class="form-group row mt-1">
                                <label for="password" class="col-md-12 col-form-label text-md-right">Constraseña</label>
                                    <input id="password" type="password" class="form-control" v-model="password"
                                           required autocomplete="off" placeholder="Ingrese su Contraseña">
                            </div>

                            <div class="form-group row mt-1 mb-0 text-center">
                                    <router-link to="/" class="nav-item nav-link mt-2"><button class="fondo-color tamaño_session" @click="doLogin">Iniciar Sesión</button></router-link>
                            </div>

                            <div class="row mt-1 text-center">
                                    <small class="text-muted">
                                        <router-link to="/register" style="text-decoration: none; color: var(--color1);">¿No tienes una cuenta? ¡Regístrate!</router-link>
                                    </small>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: "",
            password: "",
            error: null
        }
    },
    methods: {
        doLogin(e) {
            e.preventDefault()
            if(this.password.length > 0) {
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/login', {
                        email: this.email,
                        password: this.password
                    })
                        .then(response => {
                            if (response.data.success) {
                                console.error('OK');
                                window.location.href = "/login"
                            } else {
                                console.error('No loggin');
                                this.error = response.data.message
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                })
            }
        }
    },
    beforeRouteEnter(to, from, next){
        if(window.Laravel.isLoggedin){
            return next('/');
        }
        next();
    }
}
</script>