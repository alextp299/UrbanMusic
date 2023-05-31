<template>
    <div class="container-fluid mt-5 mb-5">
      <h3 class="mb-4">Administración de Usuarios</h3>
  
        <div class="card card-default d-flex px-5 py-5 mt-5">
            <div class="p-1">
                <div class="d-flex justify-content-between pb-2 mb-2">
                    <h5 class="card-title">Editar Usuario</h5>
                    <div>
                        <router-link :to="{name: 'adminusers'}" class="nav-item nav-link"><button class="fondo-color tamaño_session2">Volver</button></router-link>
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
    
                <form @submit.prevent="updatePost" enctype="multipart/form-data">
  
                    <div class="form-group mb-2 mt-4">
                        <label class="mb-2">Nombre</label><span class="text-danger"> *</span>
                        <input type="text" class="form-control mb-2" v-model="name" placeholder="Introduce el nombre">
                    </div>
  
                    <div class="form-group mb-2 mt-4">
                        <label class="mb-2">Correo Electrónico</label><span class="text-danger">*</span>
                        <input type="email" class="form-control mb-2" v-model="email" placeholder="Introduce el correo">
                    </div>

                    <div class="form-group mb-2 mt-4">
                        <label class="mb-2">Contraseña</label><span class="text-danger"> *</span>
                        <input type="password" class="form-control mb-2" v-model="password" placeholder="Introduce la contraseña">
                    </div>

                    <div class="form-group mb-2 mt-4">
                      <label class="mb-2" for="rol">Rol</label><span class="text-danger"> *</span>
                      <div class="mt-1">
                        <div v-for="role in roles" :key="role.id" class="d-inline-block ms-5">
                          <label class="mt-2">
                            <input type="checkbox" :value="role.id" v-model="selectedRoles"> {{ role.rol }}
                          </label>
                        </div>
                      </div>
                    </div>       
  
                    <button type="submit" class="fondo-color tamaño_session2 mt-4">Guardar cambios</button>
                </form>
            </div>
        </div>
  
    </div>
  </template>
  
  
  <script>
  export default {
    data() {
        return {
            id: '',
            name: '',
            email: '',
            password: '',
            strSuccess: '',
            strError: '',
            selectedRoles: [],
            roles: [],
        }
    },created() {
         this.$axios.get('/sanctum/csrf-cookie').then(response => {
             this.$axios.get(`/api/editUser/${this.$route.params.id}`)
                 .then(response => {
                     this.name = response.data['name'];
                     this.precio = response.data['email'];
                     this.id_categoria = response.data['passowrd'];
                     
                 })
                 .catch(function(error) {
                     console.log(error);
                 });
         })
        // Obtén los roles de la base de datos y asígnalos a la propiedad "roles"
    this.$axios.get('/api/roles')
      .then(response => {
        this.roles = response.data;
      })
      .catch(error => {
        console.error(error);
      });
     },
     methods: {
         updatePost(e) {
             this.$axios.get('/sanctum/csrf-cookie').then(response => {
                 let existingObj = this;
                 const config = {
                     headers: {
                         'content-type': 'multipart/form-data'
                     }
                 }
  
                 const formData = new FormData();
                 formData.append('name', this.name);
                 formData.append('email', this.email);
                 formData.append('password', this.password);
                 this.selectedRoles.forEach(role => {
                    formData.append('roles[]', role);
                });
                 this.$axios.post(`/api/updateUserAdmin/${this.$route.params.id}`, formData, config)
                     .then(response => {
                         existingObj.strError = "";
                         existingObj.strSuccess = response.data.success;
                     })
                     .catch(function(error) {
                         existingObj.strSuccess ="";
                         existingObj.strError = error.response.data.message;
                     });
             });
         }
     },beforeRouteEnter(to, from, next) {
  if (!window.Laravel.isLoggedin) {
    window.location.href = "/";
  } else {
    let canAdd = false;

    // Bucle para comprobar si existe el rol 'editar' 'eliminar' o 'añadir'
    for (let role of window.Laravel.user.roles) {
      if (role.rol === 'editar') {
        canAdd = true;
      }

    }

    if (canAdd) {
      next();
    } else {
      next('/');
    }
  }
}
     
  }
  
  </script>