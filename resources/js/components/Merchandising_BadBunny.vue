<template>
    <div>
      <h1>Productos</h1>
  
      <table class="table table-hover table-sm">
        <tbody>
          <tr v-for="(producto, index) in productos" :key="index">
            <td class="text-center">{{ producto.id }}</td>
            <td>{{ producto.name }}</td>
            <td>{{ producto.precio }}</td>
            <td class="text-center">
                        <div v-if="producto.image">
                            <img alt="post-img" width="150" v-bind:src="'/img/Merchandising_BadBunny/' + producto.image">
                        </div>
                    </td>
            <td><button @click="agregarProducto(producto.id)">Añadir</button></td>
          </tr>
        </tbody>
      </table>
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
        this.$axios.get('/api/productos')
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