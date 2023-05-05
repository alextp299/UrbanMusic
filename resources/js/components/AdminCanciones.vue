<template>
    <div class="container-fluid mt-5 mb-5">
      
      <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between pb-2 mb-2">
                <h5 class="card-title mt-2">Administrador de canciones</h5>
                <router-link :to="{name: 'formularioañadircanciones'}" class="nav-item nav-link mb-4"><button class="fondo-color tamaño_session2">Añadir</button></router-link>
            </div>

            <table class="table table-hover table-sm">
                <thead class="bg-dark text-light">
                <tr>
                    <th width="50" class="text-center">#</th>
                    <th class="text-center" style="width: 30%;">Name</th>
                    <th class="text-center" style="width: 20%">Description</th>
                    <th class="text-center" style="width: 20%">Image</th>
                    <th class="text-center" style="width: 30%">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(cancion, index) in canciones" :key="cancion.id">
                    <td class="text-center">{{index}}</td>
                    <td class="text-center">{{cancion.name}}</td>
                    <td class="text-center">{{cancion.audio}}</td>
                    <td class="text-center">
                        <div v-if="cancion.image">
                            <img alt="cancion-img" width="100" v-bind:src="'/img/Music_Imagenes/' + cancion.image">
                        </div>
                    </td>
                    <td class="text-center">
                      <router-link :to="{ name: 'formularioeditarcanciones', params: { id: cancion.id } }" class="nav-item nav-link mt-2">
                        <button class="fondo-color tamaño_session2">Editar</button>
                      </router-link><br>
                        <button class="fondo-color1 tamaño_session2" @click="eliminarProducto(cancion.id)">Eliminar</button>
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