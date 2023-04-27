<template>
  <div class="container-fluid mt-5 mb-5" style="min-height: 400px;">
    <h3 class="mb-4">Tu carrito</h3>
    <div class="row">
    <div class="col-md-4" v-for="(producto, index) in productos" :key="index">
      <div class="card mb-5 container" id="tamaño-card">
        <img class="card-img-top2 image" v-bind:src="'/img/Merchandising/' + producto.image" alt="Imagen del producto">
        <div class="card-body">
          <h5 class="card-title">{{ producto.name }}</h5>
          <p class="card-text">{{ producto.precio }} €</p>
          <div class="form-group row">
            <label for="cantidad" class="col-sm-4 col-form-label">Cantidad:</label>
            <div class="col-sm-5">
              <div class="input-group">
                <button class="btn btn-outline-secondary" type="button" @click="decrementarCantidad(producto)">-</button>
                <input type="number" class="form-control text-center" id="cantidad" v-model.number="producto.cantidad" min="1">
                <button class="btn btn-outline-secondary" type="button" @click="incrementarCantidad(producto)">+</button>
              </div>
            </div>
          </div>
          <button class="btn btn-danger" @click="eliminarProducto(producto.id)">Eliminar</button>
        </div>

      </div>
    </div>
  </div>
  </div>

    <div class="row justify-content-end align-items-center">
      <div class="col-md-4">
        <div class="card posicion-card card-default d-flex px-3 py-3">
          <div class="card-body p-1">
            <h5 class="text-start p-1">Total pedido</h5>
          </div>
          <div class="card-body text-start">
            <form>
              <div class="form-group row">
                <p>Subtotal</p>
                <div class="px-3">
                  <hr>
                </div>
              </div>
              <div class="form-group row mt-1">
                  <p>Total</p>
                  <p class="text-end">{{ precioTotal }} €</p>
              </div>
              <div class="form-group row mt-1 mb-0 text-center">
                <router-link to="/finalizacioncompra" class="nav-item nav-link mt-2">
                  <button class="fondo-color tamaño_session" style="width: 100%;" @click="pedidos">Finalizar Pedido</button>
                </router-link>
              </div>
            </form>
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
      isLoggedin: false,
      user: null,
      strSuccess: '',
      strError: ''
    }
  },
  created() {
    if(window.Laravel.isLoggedin){
            this.isLoggedin =true;
            this.user =window.Laravel.user;
        }
  // Obtiene los productos del carrito y establece su cantidad inicial en 1
  this.$axios.get('/sanctum/csrf-cookie').then(response => {
    axios.get('/api/carrito')
      .then(response => {
        // Maneja la respuesta de la API
        this.productos = Array.from(response.data);
        console.log(this.productos);

        // Establece la cantidad inicial de cada producto en 1
        this.productos.forEach(producto => {
          producto.cantidad = 1;
        });

        // Actualiza el precio total
        this.actualizarPrecioTotal();
      })
      .catch(error => {
        // Maneja los errores de la solicitud HTTP
        console.log(error);
      });
  });

  // Obtiene el precio total del carrito
  axios.get('/api/precioTotal')
    .then(response => {
      // Maneja la respuesta de la API
      this.precioTotal = response.data;
      console.log(this.precioTotal);
    })
    .catch(error => {
      // Maneja los errores de la solicitud HTTP
      console.log(error);
    });
},
  
  methods: {

    pedidos(e){
            e.preventDefault()
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/pedidos', {

                        precio: this.precioTotal,
                        id_usuario: this.user.id
                        
                    })
                        .then(response => {
                            if (response.data.success) {
                                window.location.href = "/login"
                            } else {
                                this.error = response.data.message
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                })
        },

    actualizarPrecioTotal() {
  let total = 0;
  for (let i = 0; i < this.productos.length; i++) {
    total += this.productos[i].precio * this.productos[i].cantidad;
  }
  this.precioTotal = total.toFixed(2); // Redondea a dos decimales
},

    incrementarCantidad(producto) {
    producto.cantidad++;
    this.actualizarPrecioTotal();
  },
  decrementarCantidad(producto) {
    if (producto.cantidad > 1) {
      producto.cantidad--;
      this.actualizarPrecioTotal();
    }
  }, eliminarProducto(id) {
      axios.post('/api/eliminar/' + id, {
          _method: 'DELETE'
        })
        .then(response => {
          // Maneja la respuesta de la API
          console.log(response.data);
          // Elimina el producto del array
          this.productos = this.productos.filter(producto => producto.id !== id);
          // Actualiza el precio total
          this.actualizarPrecioTotal();
        })
        .catch(error => {
          // Maneja los errores de la solicitud HTTP
          console.log(error);
        });
    },
    
    },
};
</script>