<template>
    <div class="container-fluid mt-5 mb-5">
      <h3 class="mb-4">Administración de Usuarios</h3>
      <div class="card card-default d-flex px-5 py-5">
            <div class="card-body p-1">
                <div class="d-flex justify-content-between pb-2 mb-2">
                    <h5 class="card-title">Añadir Usuarios</h5>
                    <div>
                        <router-link :to="{name: 'merchandising'}" class="nav-item nav-link mt-2"><button class="fondo-color tamaño_session2">Volver</button></router-link>
                    </div>
                </div>
    
                <div v-if="strSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{strSuccess}}</strong>
                </div>
    
    
                <div v-if="strError" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{strError}}</strong>
                </div>
    
                <form @submit.prevent="addPost" enctype="multipart/form-data">
                    <div class="form-group mb-2 mt-4">
                        <label class="mb-2">Nombre</label><span class="text-danger"> *</span>
                        <input type="text" class="form-control mb-2" v-model="name" placeholder="Introduce el nombre del producto">
                    </div>
    
    
                    <div class="form-group mb-2 mt-4">
                        <label class="mb-2">Email</label><span class="text-danger"> *</span>
                        <input type="text" class="form-control mb-2" v-model="email" placeholder="Introduce el precio">
                    </div>

                    <div class="form-group mb-2 mt-4">
                        <label class="mb-2">Password</label><span class="text-danger"> *</span>
                        <input type="text" class="form-control mb-2" v-model="password" placeholder="Introduce el nombre del producto">
                    </div>
  
                    <div class="form-group mb-2 mt-4">
                      <label class="mb-2" for="rol" name="id_categoria">Rol</label>
                      <select class="form-control mb-2" name="id_categoria" v-model="rol">
                          <option value="" selected> Seleccionar rol</option>
                          <option></option>
                          <option value="1">Admin</option>
                          <option value="2">Moderador</option>
                          <option value="3">Cliente</option>
                      </select>
                    </div>  
  
                  <button type="submit" class="fondo-color tamaño_session2 mt-4 mb-4">Confirmar</button>
    
                </form>
    
            </div>
        </div>
  
    </div>
  </template>
  
  
  <script>
  export default {
    data() {
        return {
            name: '',
            email: '',
            password: '',
            rol: '',
            strSuccess: '',
            strError: '',
        }
    },
    methods: {
        addPost(e) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                let existObj = this;
                const config = {
                    headers:{
                        'content-type': 'multipart/form-data'
                    }
                }
  
                const formData = new FormData();
                formData.append('name', this.name);
                formData.append('email', this.email);
                formData.append('password', this.password);
                formData.append('rol', this.rol);
  
  
                this.$axios.post('/api/addUsuarioAdmin', formData, config)
                    .then(response => {
                        existObj.strError = "";
                        existObj.strSuccess = response.data.success;
                        }
                    )
                    .catch(function (error){
                        existObj.strError = error.response.data.message;
                        existObj.strSuccess = "";
                        }
                    );
            });
        }
    }
  }
  
  </script>