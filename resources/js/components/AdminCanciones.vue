<template>
    <div class="container-fluid mt-5 mb-5">
      <h3 class="mb-4">Administrador de canciones</h3>
      
      <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between pb-2 mb-2">
                <h5 class="card-title">All Posts Data</h5>
                
            </div>
            <div>
        <router-link :to="{name: 'formularioañadircanciones'}" class="nav-item nav-link mt-2 mb-4"><button class="fondo-color tamaño_session2">Añadir</button></router-link>
        
      </div>

            <table class="table table-hover table-sm">
                <thead class="bg-dark text-light">
                <tr>
                    <th width="50" class="text-center">#</th>
                    <th>Name</th>
                    <th>Audio</th>
                    <th class="text-center" width="120">Image</th>
                    <th class="text-center" width="200">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(cancion, index) in canciones" :key="cancion.id">
                    <td class="text-center">{{index}}</td>
                    <td>{{cancion.name}}</td>
                    <td>{{cancion.audio}}</td>
                    <td class="text-center">
                        <div v-if="cancion.image">
                            <img alt="cancion-img" width="100" v-bind:src="'/img/Music_Imagenes/' + cancion.image">
                        </div>
                    </td>
                    <td class="text-center">
                      <router-link :to="{ name: 'formularioeditarcanciones', params: { id: cancion.id } }" class="nav-item nav-link mt-2">
                        <button class="fondo-color tamaño_session2">Editar</button>
                      </router-link>
                        <button class="btn btn-danger posicion-movil " @click="eliminarProducto(cancion.id)">Eliminar</button>
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
          canciones: [],
          strSuccess: '',
          strError: '',
          
      }
  },created() {
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
    },
  methods: {
    eliminarProducto(id) {
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

        this.$axios.get('/api/canciones')
          .then(response => {
            this.canciones = response.data;
          })
          .catch(function (error) {
            console.log(error);
          });
        
      });
  }

  }
}

</script>