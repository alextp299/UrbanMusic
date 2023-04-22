<template>
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <!-- {{name}} -->
                <div v-if="error !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{error}}</strong>
                </div>
 
 
                <div class="card card-default d-flex px-5 py-5">
                    <div class="card-body p-1 text-center"><h5>¡Registrate!</h5></div>
                    <div class="card-body">
                        <form>
 
 
                            <div class="form-group row">
                                <label for="name" class="col-sm-12 col-form-label text-md-right">Nombre y Apellido/s</label>
                                    <input id="name" type="text" class="form-control" v-model="name" required
                                           autofocus autocomplete="off"  placeholder="Ingrese su Nombre">
                            </div>
 
 
                            <div class="form-group row mt-1">
                                <label for="email" class="col-sm-12 col-form-label text-md-right">Correo Electrónico</label>
                                    <input id="email" type="email" class="form-control" v-model="email" required
                                           autofocus autocomplete="off" placeholder="Ingrese su Correo">
                            </div>
 
                            <div class="form-group row mt-1">
                                <label for="password" class="col-md-12 col-form-label text-md-right">Contraseña</label>
                                    <input id="password" type="password" class="form-control" v-model="password"
                                           required autocomplete="off" placeholder="Ingrese su Contraseña">
                            </div>
 
 
                            <div class="form-group row mt-1 mb-0 text-center">
                                    <router-link to="/login" class="nav-item nav-link mt-2"><button class="fondo-color tamaño_session" @click="register">Registrarse</button></router-link>
                            </div>
 
 
                            <div class="row mt-1 text-center">
                                    <small class="text-muted">
                                        <router-link to="/login" style="text-decoration: none; color: var(--color1);">¿Ya tiene cuenta? ¡Inicia sesión!</router-link>
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
    name: "Register"
    ,data() {
        return {
            name:"",
            email:"",
            password:"",
            error: null
        }
    },
    methods: {
        register(e){
            e.preventDefault()
            if(this.password.length > 0) {
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/register', {
                        name: this.name,
                        email: this.email,
                        password: this.password
                    })
                        .then(response => {
                            if (response.data.success) {
                                window.location.href = "/login"
                            } else {
                                this.error = response.data.message
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                })
            }
        }
    }
 
 
 }
 </script>
 
 
 <style scoped>
 
 
 </style> 