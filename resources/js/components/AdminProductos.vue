<template>
  <div class="container-fluid mt-5 mb-5">
    <h3 class="mb-4">Administración de Productos</h3>
    <div class="card card-default d-flex px-5 py-5">
          <div class="card-body p-1">
              <div class="d-flex justify-content-between pb-2 mb-2">
                  <h5 class="card-title">Añadir Productos</h5>
                  <div>
                      <router-link :to="{name: 'merchandising'}" class="nav-item nav-link mt-2"><button class="fondo-color tamaño_session2">Volver</button></router-link>
                  </div>
              </div>
  
  
              <div v-if="strSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  <strong>{{strSuccess}}</strong>
              </div>
  
  
              <div v-if="strError" class="alert alert-danger alert-dismissible fade show" role="alert">
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  <strong>{{strError}}</strong>
              </div>
  
  
  
  
              <form @submit.prevent="addPost" enctype="multipart/form-data">
                  <div class="form-group mb-2 mt-4">
                      <label class="mb-2">Nombre</label><span class="text-danger"> *</span>
                      <input type="text" class="form-control mb-2" v-model="name" placeholder="Introduce el nombre del producto">
                  </div>
  
  
                  <div class="form-group mb-2 mt-4">
                      <label class="mb-2">Precio</label><span class="text-danger"> *</span>
                      <input type="text" class="form-control mb-2" v-model="precio" placeholder="Introduce el precio">
                  </div>

                  <div class="form-group mb-2 mt-4">
                    <label class="mb-2" for="id_categoria" name="id_categoria">Categoria</label>
                    <select class="form-control mb-2" name="id_categoria" v-model="id_categoria">
                        <option value="" selected> Seleccionar categoria</option>
                        <option></option>
                        <option value="1">Eladio Carrión</option>
                        <option value="2">Bad Bunny</option>
                        <option value="3">Rosalía</option>
                    </select>
                  </div>  
  
                  <div class="form-gorup mb-2 mt-4">
                      <label class="mb-2">Imagen</label><span class="text-danger"> *</span>
                      <input type="file" class="form-control mb-2" v-on:change="onChangeImg">
                  </div>

                <button type="submit" class="fondo-color tamaño_session2 mt-4 mb-4">Confirmar</button>
  
              </form>
  
          </div>
      </div>

      <div class="card card-default d-flex px-5 py-5 mt-5">
          <div class="card-body p-1">
              <div class="d-flex justify-content-between pb-2 mb-2">
                  <h5 class="card-title">Eliminar Producto</h5>
                  <div>
                      <router-link :to="{name: 'merchandising'}" class="nav-item nav-link mt-2"><button class="fondo-color tamaño_session2">Volver</button></router-link>
                  </div>
              </div>

              <div v-if="strSuccess2" class="alert alert-success alert-dismissible fade show" role="alert">
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  <strong>{{strSuccess2}}</strong>
              </div>
  
  
              <div v-if="strError2" class="alert alert-danger alert-dismissible fade show" role="alert">
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  <strong>{{strError2}}</strong>
              </div>
  
              <form @submit.prevent="delPost" enctype="multipart/form-data">
                  <div class="form-group mb-2">
                      <label>Nombre</label>
                      <input type="text" class="form-control" v-model="id" placeholder="Nombre de la canción">
                  </div>

                  <button type="submit" class="fondo-color tamaño_session2 mt-4 mb-4">Eliminar</button>
              </form>
          </div>
      </div>

      <div class="card card-default d-flex px-5 py-5 mt-5">
          <div class="card-body p-1">
              <div class="d-flex justify-content-between pb-2 mb-2">
                  <h5 class="card-title">Editar Producto</h5>
                  <div>
                      <router-link :to="{name: 'merchandising'}" class="nav-item nav-link mt-2"><button class="fondo-color tamaño_session2">Volver</button></router-link>
                  </div>
              </div>

              <div v-if="strSuccess3" class="alert alert-success alert-dismissible fade show" role="alert">
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  <strong>{{strSuccess3}}</strong>
              </div>
  
  
              <div v-if="strError3" class="alert alert-danger alert-dismissible fade show" role="alert">
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  <strong>{{strError3}}</strong>
              </div>
  
              <form @submit.prevent="editPost" enctype="multipart/form-data">
                  <div class="form-group mb-2">
                      <label>Nombre Anterior</label>
                      <input type="text" class="form-control" v-model="last_name" placeholder="Nombre de la canción">
                  </div>

                  <div class="form-group mb-2">
                      <label>Nombre Nuevo</label>
                      <input type="text" class="form-control" v-model="new_name" placeholder="Nombre de la canción">
                  </div>

                  <div class="form-group mb-2 mt-4">
                      <label class="mb-2">Precio</label>
                      <input type="text" class="form-control mb-2" v-model="editPrecio" placeholder="Introduce el precio">
                  </div>

                  <div class="form-group mb-2 mt-4">
                    <label class="mb-2" for="id_categoria" name="id_categoria">Categoria</label>
                    <select class="form-control mb-2" name="id_categoria" v-model="editId_categoria">
                        <option value="" selected> Seleccionar categoria</option>
                        <option></option>
                        <option value="1">Eladio Carrión</option>
                        <option value="2">Bad Bunny</option>
                        <option value="3">Rosalía</option>
                    </select>
                  </div>

                  <div class="form-gorup mb-2 mt-4">
                      <label class="mb-2">Imagen</label>
                      <input type="file" class="form-control mb-2" v-on:change="onChangeEditImg">
                  </div>

                  <button type="submit" class="fondo-color tamaño_session2 mt-4 mb-4">Editar</button>
              </form>
          </div>
      </div>

  </div>
</template>


<script>
export default {
  data() {
      return {
          id: '',
          name: '',
          precio: '',
          id_categoria: '',
          image: '',
          last_name: '',
          new_name: '',
          editPrecio: '',
          editId_categoria: '',
          editImage: '',
          strSuccess: '',
          strError: '',
          strSuccess2: '',
          strError2: '',
          strSuccess3: '',
          strError3: '',
          imgPreview: null,
          imgEditPreview: null
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
      },
      delPost(e) {
          this.$axios.get('/sanctum/csrf-cookie').then(response => {
              let existObj = this;
              const config = {
                  headers:{
                      'content-type': 'multipart/form-data'
                  }
              }
              
              const formData = new FormData();
              formData.append('name', this.id);

              this.$axios.post('/api/delProducto', formData, config)
                  .then(response => {
                      existObj.strError2 = "";
                      existObj.strSuccess2 = response.data.success;
                      }
                  )
                  .catch(function (error){
                      existObj.strError2 = error.response.data.message;
                      existObj.strSuccess2 = "";
                      }
                  );
          });
      },editPost(e) {
          this.$axios.get('/sanctum/csrf-cookie').then(response => {
              let existObj = this;
              const config = {
                  headers:{
                      'content-type': 'multipart/form-data'
                  }
              }
              
              const formData = new FormData();
              formData.append('last_name', this.last_name);
              formData.append('name', this.new_name);
              formData.append('precio', this.editPrecio);
              formData.append('id_categoria', this.editId_categoria);
              formData.append('file', this.editImage);
        

              this.$axios.post('/api/editProducto', formData, config)
                  .then(response => {
                      existObj.strError3 = "";
                      existObj.strSuccess3 = response.data.success;
                      }
                  )
                  .catch(function (error){
                      existObj.strError3 = error.response.data.message;
                      existObj.strSuccess3 = "";
                      }
                  );
          });
      }
      /* FIN*/
  }
}


</script>