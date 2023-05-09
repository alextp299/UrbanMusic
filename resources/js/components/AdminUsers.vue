<template>
    <div class="container-fluid mt-5 mb-5">
      
      <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between pb-2 mb-2">
                <h5 class="card-title mt-2">Administrador de Usuarios</h5>
                
                <router-link :to="{name: 'formularioañadirproductos'}" class="nav-item nav-link mt-2 mb-4"><button class="fondo-color tamaño_session2">Añadir</button></router-link>
                
            </div>
            <input type="text" v-model="busqueda" placeholder="Buscar productos" class="form-control mb-5">
            <table class="table table-hover table-sm table-bordered">
                <thead class="bg-dark text-light">
                <tr>
                    <th class="text-center" style="width: 5%;">#</th>
                    <th class="text-center" style="width: 20%;">Name</th>
                    <th class="text-center" style="width: 20%">Correo</th>
                    <th class="text-center" style="width: 20%">Rol</th>
                    <th class="text-center" style="width: 10%">Actions</th>
                </tr>
                </thead>
                <tbody>
                  <tr v-for="(user, index) in users" :key="index">
                    <td class="text-center">{{index}}</td>
                    <td class="text-center">{{user.name}}</td>
                    <td class="text-center">{{user.email}}</td>
                    <td class="text-center">{{user.id_rol}}</td>
                    <td class="text-center">
                      <router-link :to="{ name: 'formularioeditarproductos', params: { id: user.id } }" class="nav-item nav-link">
                      <button class="fondo-color tamaño_session2">Editar</button>
                    </router-link>
                        <br>
                        <button class="fondo-color1 tamaño_session2" @click="eliminarProducto(user.id)">Eliminar</button>
                    </td>
                    
                </tr>
                </tbody>
            </table>
  
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
    productosFiltrados() {
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
    eliminarProducto(id) {
    this.$axios.delete('/api/deleteProducto/' + id)
      .then(response => {
  
        this.$axios.get('/api/productos')
          .then(response => {
            this.productos = response.data;
          })
          .catch(function (error) {
            console.log(error);
          });
        
      })
      .catch(error => {
  
        this.$axios.get('/api/productos')
          .then(response => {
            this.productos = response.data;
          })
          .catch(function (error) {
            console.log(error);
          });
        
      });
  }
  
  },beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
          window.location.href = "/";
        } else {
          if (window.Laravel.user.role === 'admin') {
            next();
          } else {
            next('/');
          }
        }
    }
  }
  
  </script>