<template>
  <div class="container-fluid mt-5 mb-5">
    <h3 class="mb-4">Rosalia</h3>
      <div>
        <router-link :to="{name: 'formularioañadirproductos'}" class="nav-item nav-link mt-2"><button class="fondo-color tamaño_session2">Añadir</button></router-link>
        <router-link :to="{name: 'formularioeditarproductos'}" class="nav-item nav-link mt-2"><button class="fondo-color tamaño_session2">Editar</button></router-link>
      </div>
    <div class="row">
      <div class="col-md-4" v-for="(producto, index) in productos" :key="index">
        <div class="card mb-5 container">
          <img class="card-img-top2 image" v-bind:src="'/img/Merchandising/' + producto.image" alt="Imagen del producto">
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
  methods: {
      onChangeImg(e) {
          this.image = e.target.files[0];
          let reader = new FileReader();
          reader.addEventListener("load", function () {
              this.imgPreview = reader.result;
          }.bind(this), false);


          if (this.image) {
              if ( /\.(jpe?g|png|gif)$/i.test( this.image.name ) ) {
                  reader.readAsDataURL( this.image );
              }
          }
      },onChangeEditImg(e) {
  this.editImage = e.target.files[0];
  this.editImageName = this.editImage.name; // Agregar esta línea

  let reader = new FileReader();
  reader.addEventListener("load", function () {
      this.imgEditPreview = reader.result;
  }.bind(this), false);

  if (this.editImage) {
      if ( /\.(jpe?g|png|gif|webp)$/i.test( this.editImage.name ) ) {
          reader.readAsDataURL( this.editImage );
      }
  }
},

      /*Inicio*/
      addPost(e) {
          this.$axios.get('/sanctum/csrf-cookie').then(response => {
              let existObj = this;
              const config = {
                  headers:{
                      'content-type': 'multipart/form-data'
                  }
              }

              const formData = new FormData();
              formData.append('name', this.name);
              formData.append('precio', this.precio);
              formData.append('id_categoria', this.id_categoria);
              formData.append('file', this.image);


              this.$axios.post('/api/addProducto', formData, config)
                  .then(response => {
                      existObj.strError = "";
                      existObj.strSuccess = response.data.success;
                      }
                  )
                  .catch(function (error){
                      existObj.strError = error.response.data.message;
                      existObj.strSuccess = "";
                      }
                  );
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