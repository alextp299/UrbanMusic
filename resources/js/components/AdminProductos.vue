<template>
  <div class="container-fluid mt-5 mb-5">
    <h3 class="mb-4">Administrador de productos</h3>
    
    <div class="card">
      <div class="card-body">
          <div class="d-flex justify-content-between pb-2 mb-2">
              <h5 class="card-title">All Posts Data</h5>
              
          </div>
          <div>
      <router-link :to="{name: 'formularioañadirproductos'}" class="nav-item nav-link mt-2 mb-4"><button class="fondo-color tamaño_session2">Añadir</button></router-link>
      
    </div>

          <table class="table table-hover table-sm">
              <thead class="bg-dark text-light">
              <tr>
                  <th width="50" class="text-center">#</th>
                  <th class="text-center" style="width: 25%;">Name</th>
                  <th class="text-center" style="width: 30%">Image</th>
                  <th class="text-center" style="width: 30%">Actions</th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="(producto, index) in productos" :key="index">
                  <td class="text-center">{{index}}</td>
                  <td class="text-center">{{producto.name}}</td>
                  <td class="text-center">
                      <div v-if="producto.image">
                          <img alt="cancion-img" width="150" v-bind:src="'/img/Merchandising/' + producto.image">
                      </div>
                  </td>
                  <td class="text-center">
                      <router-link :to="{name: 'formularioeditarproductos'}" class="nav-item nav-link mt-2"><button class="fondo-color tamaño_session2">Editar</button></router-link>
                      <button class="btn btn-danger posicion-movil" @click="eliminarProducto(producto.id)">Eliminar</button>
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
        productos: [],
        strSuccess: '',
        strError: '',
        
    }
},created() {
      this.$axios.get('/sanctum/csrf-cookie').then(response => {
          this.$axios.get('/api/productos')
              .then(response => {
                  this.productos = response.data;
              })
              .catch(function (error) {
                  console.log(error);
              });
          }
      );
  },
methods: {
  eliminarProducto(id) {
  this.$axios.delete('api/delete/' + id)
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

}
}

</script>