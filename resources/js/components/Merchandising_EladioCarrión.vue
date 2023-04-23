<template>
  <div class="container-fluid mt-5 mb-5">
    <h3 class="mb-4">Eladio Carrión</h3>
    <div class="row">
      <div class="col-md-4" v-for="(producto, index) in productos" :key="index">
        <div class="card mb-5 container">
          <img class="card-img-top2 image" v-bind:src="'/img/Merchandising_EladioCarrion/' + producto.image" alt="Imagen del producto">
          <div class="middle">
            <button @click="agregarProducto(producto)" class="fondo-color tamaño_session">Añadir al carrito</button>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ producto.name }}</h5>
            <p class="card-text">{{ producto.precio }} €</p>
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