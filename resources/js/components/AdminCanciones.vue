<template>
  <div class="container-fluid mt-5 mb-5">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between pb-2 mb-2">
          <h5 class="card-title mt-2">Administrador de canciones</h5>
          <router-link :to="{name: 'formularioañadircanciones'}" class="nav-item nav-link mb-4">
            <button class="fondo-color tamaño_session2">Añadir</button>
          </router-link>
        </div>
        <input type="text" v-model="busqueda" placeholder="Buscar productos" class="form-control mb-5">
        <div class="table-responsive text-center">
          <table class="table table-hover align-middle table-sm table-bordered">
            <thead class="bg-dark text-light">
              <tr>
                <th class="text-center" style="width: 5%;">#</th>
                <th class="text-center" style="width: 20%;">Name</th>
                <th class="text-center" style="width: 20%">Description</th>
                <th class="text-center" style="width: 5%">Image</th>
                <th class="text-center" style="width: 10%">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(cancion, index) in productosFiltrados" :key="index">
                <td class="text-center">{{index}}</td>
                <td class="text-center">{{cancion.name}}</td>
                <td class="text-center">{{cancion.audio}}</td>
                <td class="text-center">
                  <div v-if="cancion.image">
                    <img alt="cancion-img" width="100" v-bind:src="'/img/Music_Imagenes/' + cancion.image">
                  </div>
                </td>
                <td>
                  <router-link :to="{ name: 'formularioeditarcanciones', params: { id: cancion.id } }" class="nav-item nav-link">
                    <button class="fondo-color tamaño_session2">Editar</button>
                  </router-link>
                  <br>
                  <button class="fondo-color1 tamaño_session2" @click="eliminarCancion(cancion.id)">Eliminar</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
      return {
          isLoggedin: false,
          user: null,
          canciones: [],
          strSuccess: '',
          strError: '',
          busqueda: '',
          
      }
  },
  
  created() {
        if(window.Laravel.isLoggedin){
            this.isLoggedin =true;
            this.user =window.Laravel.user;
        }
        
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/canciones')
                .then(response => {
                    this.canciones = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        );
    },computed: {
  productosFiltrados() {
    if (this.busqueda.trim() === '') {
      return this.canciones;
    } else {
      return this.canciones.filter(cancion =>
        cancion.name.toLowerCase().includes(this.busqueda.toLowerCase())
      );
    }
  }
},
  methods: {
    eliminarCancion(id) {
    this.$axios.delete('/api/delete/' + id)
      .then(response => {

        this.$axios.get('/api/canciones')
          .then(response => {
            this.canciones = response.data;
          })
          .catch(function (error) {
            console.log(error);
          });
        
      })
      .catch(error => {
        
      });
  },
  

  },
  beforeRouteEnter(to, from, next) {
  if (!window.Laravel.isLoggedin) {
    window.location.href = "/";
  } else {
    let canAccesUser = false;

    // Bucle para comprobar si existe el rol 'editar' 'eliminar' o 'añadir'
    for (let role of window.Laravel.user.roles) {
      if (role.rol === 'accederAdmin') {
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