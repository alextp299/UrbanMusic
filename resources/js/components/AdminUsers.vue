<template>
    <div class="container-fluid mt-5 mb-5">
    <h3 class="mb-4">Administrador de Usuarios</h3>
    <div class="card card-default d-flex px-5 py-5">
      <div class="p-1">
        <div class="d-flex justify-content-between pb-2 mb-2">
          <h5 class="card-title mt-2">Listado Usuarios Existentes</h5>
            <div>    
                <router-link :to="{name: 'formularioañadirusuarios'}" class="nav-item nav-link mt-2 mb-4 ">
                  <div class="añadir mt-2" aria-label="añadir" v-if="hasUserRole('añadir')"></div>
                </router-link>
            </div>
            </div>
            <input type="text" v-model="busqueda" placeholder="Buscar productos" class="form-control mb-5">
            <div class="table-responsive">
            <table class="table table-hover align-middle table-sm table-bordered">
                <thead class="bg-dark text-light">
                <tr>
                    <th class="text-center" style="width: 5%;">#</th>
                    <th class="text-center" style="width: 20%;">Nombre Usuario</th>
                    <th class="text-center" style="width: 20%">Correo</th>
                    <th class="text-center" style="width: 20%">Permisos</th>
                    <th class="text-center" style="width: 8%">Acción</th>
                </tr>
                </thead>
                <tbody>
                  <tr v-for="(user, index) in usuariosFiltrados" :key="index">
                    <td class="text-center">{{index}}</td>
                    <td class="text-center">{{user.name}}</td>
                    <td class="text-center">{{user.email}}</td>
                    <td class="text-center p-3">
                      {{ user.roles.map(role => role.rol).join(', ') }}
                    </td>
                    <td class="text-center">
                      <div class="d-flex justify-content-center">
                        <div v-if="hasUserRole('editar')" class="d-flex align-items-center">
                          <router-link :to="{ name: 'formularioeditarusuarios', params: { id: user.id } }" class="mx-2">
                            <div class="editar" aria-label="editar"></div>
                          </router-link>
                        </div>
                        <div v-if="hasUserRole('eliminar')" class="d-flex align-items-center">
                          <div class="eliminar mx-2" @click="eliminarUsuario(user.id)"></div>
                        </div>
                      </div>
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
            <div class="mt-3">
            <router-link to="/" class="nav-item nav-link">
              <button class="fondo-color tamaño_session2 mt-4">Volver al Inicio</button>
            </router-link>
        </div>
        </div>
    </div>
  </div>
  </template>
  <script>
  export default {
  data() {
      return {
          users: [],
          strSuccess: '',
          strError: '',
          busqueda: '',
          
      }
  },created() {

    if(window.Laravel.isLoggedin){
            this.isLoggedin =true;
            this.user =window.Laravel.user;
        }

        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/usuariosAdmin')
                .then(response => {
                    this.users = response.data;
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        );
    },computed: {
    usuariosFiltrados() {
      if (this.busqueda.trim() === '') {
        return this.users;
      } else {
        return this.users.filter(user =>
          user.name.toLowerCase().includes(this.busqueda.toLowerCase())
        );
      }
    }
  },
  methods: {
    eliminarUsuario(id) {
    this.$axios.delete('/api/deleteUsuarioAdmin/' + id)
      .then(response => {
  
        this.$axios.get('/api/usuariosAdmin')
          .then(response => {
            this.users = response.data;
          })
          .catch(function (error) {
            console.log(error);
          });
        
      })
      .catch(error => {
  
        this.$axios.get('/api/usuariosAdmin')
          .then(response => {
            this.users = response.data;
          })
          .catch(function (error) {
            console.log(error);
          });
        
      });
    },hasUserRole(role) {
    if (this.user && this.user.roles) {
      return this.user.roles.some(userRole => userRole.rol === role);
    }
    return false;
  }
  },
  beforeRouteEnter(to, from, next) {
  if (!window.Laravel.isLoggedin) {
    window.location.href = "/";
  } else {
    let canAccesUser = false;

    // Bucle para comprobar si existe el rol 'editar' 'eliminar' o 'añadir'
    for (let role of window.Laravel.user.roles) {
      if (role.rol === 'accederUserAdmin') {
        canAccesUser = true;
      }

    }

    if (canAccesUser) {
      next();
    } else {
      next('/');
    }
  }
}

  }
  
  </script>