<template>
  <div class="container-fluid mt-5 mb-5">
    <h3 class="mb-4">Administración de Productos</h3>
      <div class="card">
          <div class="card-body">
              <div class="d-flex justify-content-between pb-2 mb-2">
                  <h5 class="card-title">Add New Post Data</h5>
                  <div>
                      <router-link :to="{name: 'merchandising'}" class="btn btn-success">Go Back</router-link>
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
                  <div class="form-group mb-2">
                      <label>Nombre</label><span class="text-danger"> *</span>
                      <input type="text" class="form-control" v-model="name" placeholder="Nombre de la canción">
                  </div>
  
  
                  <div class="form-group mb-2">
                      <label>Precio</label><span class="text-danger"> *</span>
                      <textarea class="form-control" rows="3" v-model="precio" placeholder="Introducir precio"></textarea>
                  </div>

                  <label for="id_categoria" name="id_categoria"></label>
                  <select name="id_cateogira" v-model="id_categoria">
                    <option value="1">Eladio Carrión</option>
                    <option value="2">Bad Bunny</option>
                    <option value="3">Rosalía</option>
                  </select>

  
  
                  <div class="form-gorup mb-2">
                      <label>Imagen</label><span class="text-danger"> *</span>
                      <input type="file" class="form-control mb-2" v-on:change="onChangeImg">
  
  
                      <div v-if="image">
                          <img v-bind:src="imgPreview" width="100" height="100"/>
                      </div>
                  </div>
  
  
                  <button type="submit" class="btn btn-primary mt-4 mb-4"> Add Post</button>
  
  
              </form>
  
  
          </div>
      </div>
      
  </div>
</template>


<script>
export default {
  data() {
      return {
          name: '',
          precio: '',
          id_categoria: '',
          image: '',
          strSuccess: '',
          strError: '',
          imgPreview: null
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
      }
      /* FIN*/


  }
}


</script>