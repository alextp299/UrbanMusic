<template>
  <div class="container-fluid mt-5 mb-5 margenes" style="min-height: 400px;">
    <h3 class="mb-4">Tu carrito</h3>
    <div class="compra-ver">
      <div class="row margenes2">
        <div class="col-md-5 me-4" v-for="(producto, index) in productos" :key="index">
          <div class="card mb-5 container" id="tamaño-card">
            <img class="card-img-top2 image" v-bind:src="'/img/Merchandising/' + producto.image" alt="Imagen del producto">
            <div class="card-body mb-2">
              <h5 class="card-title">{{ producto.name }}</h5>
              <p class="card-text">{{ producto.precio }} €</p>
              <div class="form-group row align-items-center">
                <label for="cantidad" class="col-sm-4 col-form-label">Cantidad:</label>
                <div class="col-sm-7 d-flex ml-auto">
                  <div class="input-group" style="position: relative; right: 10px;">
                    <button class="btn btn-outline-secondary mt-1" type="button" @click="decrementarCantidad(producto)" style="height: 40px;">-</button>
                    <input type="number" class="form-control text-center mt-1" id="cantidad" v-model.number="producto.cantidad" min="1" style="height: 40px;">
                    <button class="btn btn-outline-secondary mt-1" type="button" @click="incrementarCantidad(producto)" style="height: 40px;">+</button>
                  </div>
                  <div class="eliminar m-2 p-3" @click="eliminarProducto(producto.id)" style="position: relative; left: 20px;"></div>
                </div>
              </div>

            </div>
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
              <button class="fondo-color tamaño_session" style="width: 100%;" @click="pedidos">Finalizar Pedido</button>
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
    if (window.Laravel.isLoggedin) {
      this.isLoggedin = true;
      this.user = window.Laravel.user;
    }

    this.obtenerProductosCarrito();
  },
  
  methods: {
    obtenerProductosCarrito() {
  axios.get('/api/carrito')
    .then(response => {
      // Maneja la respuesta de la API
      this.productos = Array.from(response.data);
      console.log(this.productos);

      // Establece la cantidad inicial de cada producto en 1
      this.productos.forEach(producto => {
        producto.cantidad = 1;
      });

      this.guardarProductosEnLocalStorage(); // Guarda los productos en el almacenamiento local
      // Actualiza el precio total
      this.actualizarPrecioTotal();
    })
    .catch(error => {
      // Maneja los errores de la solicitud HTTP
      console.log(error);
    });
},

    pedidos(e) {
      e.preventDefault();
      this.$axios.get('/sanctum/csrf-cookie').then(response => {
        this.$axios.post('/api/pedidos', {
          precio: this.precioTotal,
          id_usuario: this.user.id
        })
          .then(response => {
            if (response.data.success) {
              this.obtenerProductosCarrito(); // Actualiza los productos del carrito después de realizar el pedido
              window.location.href = "/finalizacioncompra";
            } else {
              this.error = response.data.message;
            }
          })
          .catch(function (error) {
            console.error(error);
          });
      });
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
      this.guardarProductosEnLocalStorage();
    })
    .catch(error => {
      // Maneja los errores de la solicitud HTTP
      console.log(error);
    });
},
incrementarCantidad(producto) {
  producto.cantidad++;
  this.actualizarPrecioTotal();
  this.guardarProductosEnLocalStorage();
},
decrementarCantidad(producto) {
  if (producto.cantidad > 1) {
    producto.cantidad--;
    this.actualizarPrecioTotal();
    this.guardarProductosEnLocalStorage();
  }
},
guardarProductosEnLocalStorage() {
  localStorage.setItem('carritoProductos', JSON.stringify(this.productos));
},
    
    },beforeRouteEnter(to, from, next) {
  if (!window.Laravel.isLoggedin) {
    window.location.href = "/";
  } else {
    let canAdd = false;

    // Bucle para comprobar si existe el rol 'editar' 'eliminar' o 'añadir'
    for (let role of window.Laravel.user.roles) {
      if (role.rol === 'normal') {
        canAdd = true;
      }

    }

    if (canAdd) {
      next();
    } else {
      next('/');
    }
  }
}
};
</script>