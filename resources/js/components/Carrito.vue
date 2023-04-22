<template>
    <div class="container-fluid mt-5 mb-5">
      <h3 class="mb-4">Tu carrito</h3>
      <ul>
      <li v-for="(producto, index) in productos" :key="index">
        {{ producto}}
      </li>
    </ul>
      <div class="row justify-content-end align-items-center">
        <div class="col-md-4">
          <div class="card card-default d-flex px-3 py-3">
            
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
                    <p class="text-end">Total</p>
                </div>
                <div class="form-group row mt-1 mb-0 text-center">
                        <router-link to="/" class="nav-item nav-link mt-2"><button class="fondo-color tamaño_session" style="width: 100%;">Finalizar Pedido</button></router-link>
                </div>
              </form>
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
           strSuccess: '',
           strError: ''
       }
   },
   created() {
       this.$axios.get('/sanctum/csrf-cookie').then(response => {
        axios.get('/api/carrito')
    .then(response => {
        // Maneja la respuesta de la API
        let productos = response.data;
        console.log(productos);
    })
    .catch(error => {
        // Maneja los errores de la solicitud HTTP
        console.log(error);
    });
           }
       );
   },
   methods: {

   }
}
</script>
  
  <style scoped>
  
  </style>