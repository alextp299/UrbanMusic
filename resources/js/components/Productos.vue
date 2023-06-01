<template>
    <div class="container-fluid mt-5 mb-5">
      <h3 class="mb-4">Productos</h3>
      <div v-if="strSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ strSuccess }}</strong>
      </div>
      <div class="row">
        <div class="col-md-4" v-for="producto in productos" :key="producto.id">
          <div class="card mb-5 container">
            <img class="card-img-top2 image" v-bind:src="'/img/Merchandising/' + producto.image" alt="Imagen del producto">
            <div class="card-body">
              <h5 class="card-title p-2">{{ producto.name }}</h5>
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
    name: "Canciones",
  
    data() {
      return {
        productos: [],
        productosSeleccionados: [],
        strSuccess: ``
      };
    },
  
    mounted() {
      const id_categoria = this.$route.params.id_categoria;
      this.$axios
        .get(`/api/productos_categoria/${id_categoria}`)
        .then((response) => {
          this.productos = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    }, 
    methods: {
    agregarProducto(producto) {
      this.productosSeleccionados.push(producto);
      this.guardarProductosSeleccionados();
      this.strSuccess = 'Producto añadido al carrito';
    },
    guardarProductosSeleccionados() {
      this.$axios.get('/sanctum/csrf-cookie').then(response => {
        this.$axios.post('/api/pedido/guardar-productos-en-session', { productos: this.productosSeleccionados })
          .then(response => {
            console.log(response.data);
          })
          .catch(error => {
            console.log(error);
          });
      });
    },
    obtenerPrecioTotal() {
      this.$axios.get('/sanctum/csrf-cookie').then(response => {
        this.$axios.post('/api/pedido/precioTotal') 
          .then(response => {
            console.log(response.data);
          })
          .catch(error => {
            console.log(error);
          });
      });
    },
  }
  };
  </script>