<template>
  <div class="container-fluid mt-5 mb-5">
    <h3 class="mb-4">Eladio Carrión</h3>
    <div v-if="strSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              <strong>{{ strSuccess }}</strong>
    </div>
    <div class="row">
      <div class="col-md-4" v-for="(producto, index) in productos" :key="index">
        <div class="card mb-5 container">
          <img class="card-img-top2 image" v-bind:src="'/img/Merchandising/' + producto.image" alt="Imagen del producto">
          <div class="card-body">
            <h5 class="card-title">{{ producto.name }}</h5>
            <div class="d-flex justify-content-between">
              <p class="card-text p-2">{{ producto.precio }} €</p>
              <button @click="agregarProducto(producto)" class="fondo-color tamaño_session5 mt-1">Añadir al carrito</button>            
            </div>
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
        productos: [],
        productosSeleccionados: [],
        strSuccess: '',
        strError: ''
      }
    },
    created() {
      this.$axios.get('/sanctum/csrf-cookie').then(response => {
        this.$axios.get('/api/eladio')
          .then(response => {
            this.productos = response.data;
          })
          .catch(function (error) {
            console.log(error);
          });
      });
    },
    methods: {
      agregarProducto(id) {
        this.productosSeleccionados.push(id);
        this.guardarProductosSeleccionados();
        this.strSuccess = 'Producto añadido al carrito';
      },
      guardarProductosSeleccionados() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
        this.$axios.post('/api/guardar-productos-en-session', { productos: this.productosSeleccionados })
          .then(response => {
            console.log(response.data);
          })
          .catch(error => {
            console.log(error);
          });
        });
      }
    }
  }
  </script>
  
  <style scoped>
  
  </style>