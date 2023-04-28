<template>
  <div class="container-fluid mt-5 mb-5">
    <h3 class="mb-4">Administración de Canciones</h3>
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
                      <input type="text" class="form-control" v-model="name" placeholder="Introduce el nombre de la canción">
                  </div>

                  <label for="id_categoria_cancion" name="id_categoria_cancion"></label>
                  <select name="id_categoria_cancion" v-model="id_categoria">
                    <option value="1">Quevedo</option>
                    <option value="2">Bad Bunny</option>
                    <option value="3">Shakira</option>
                    <option value="4">Rosalía</option>
                    <option value="5">Eladio Carrión</option>
                    <option value="6">Karol G</option>
                  </select>
  
  
                  <div class="form-gorup mb-2">
                      <label>Audio</label><span class="text-danger"> *</span>
                      <input type="file" class="form-control mb-2" v-on:change="onChangeAudio">
  
  
                      <div v-if="audio">
                          <img v-bind:src="audioPreview" width="100" height="100"/>
                      </div>
                  </div>
  
  
                  <div class="form-gorup mb-2">
                      <label>Image</label><span class="text-danger"> *</span>
                      <input type="file" class="form-control mb-2" v-on:change="onChangeImg">
  
  
                      <div v-if="audio">
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
          audio: '',
          img: '',
          id_categoria: '',
          strSuccess: '',
          strError: '',
          imgPreview: null,
          audioPreview: null
      }
  },
  methods: {
      onChangeImg(e) {
          this.img = e.target.files[0];
          let reader = new FileReader();
          reader.addEventListener("load", function () {
              this.imgPreview = reader.result;
          }.bind(this), false);


          if (this.img) {
              if ( /\.(jpe?g|png|gif|webp)$/i.test( this.img.name ) ) {
                  reader.readAsDataURL( this.img );
              }
          }
      },
      onChangeAudio(e) {
          this.audio = e.target.files[0];
          let reader = new FileReader();
          reader.addEventListener("load", function () {
              this.audioPreview = reader.result;
          }.bind(this), false);


          if (this.img) {
              if ( /\.(mp3)$/i.test( this.audio.name ) ) {
                  reader.readAsDataURL( this.audio );
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
              formData.append('audio', this.audio);
              formData.append('file', this.img);
              formData.append('id_categoria_cancion', this.id_categoria);


              this.$axios.post('/api/addCanciones', formData, config)
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