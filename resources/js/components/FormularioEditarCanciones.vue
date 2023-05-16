<template>
  <div class="container-fluid mt-5 mb-5">
    <h3 class="mb-4">Administración de Canciones</h3>
      

      <div class="card card-default d-flex px-5 py-5 mt-5">
          <div class="p-1">
              <div class="d-flex justify-content-between pb-2 mb-2">
                  <h5 class="card-title">Editar Canción</h5>
                  <div>
                      <router-link :to="{name: 'admincanciones'}" class="nav-item nav-link"><button class="fondo-color tamaño_session2">Volver</button></router-link>
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
  
              <form @submit.prevent="updatePost" enctype="multipart/form-data">
               <div class="form-group mb-2 mt-4">
                   <label class="mb-2">Nombre de la canción</label><span class="text-danger"> *</span>
                   <input type="text" class="form-control" v-model="name" placeholder="Introduce el nombre de la canción">
               </div>

               <div class="form-group mb-2 mt-4">
                    <label class="mb-2" for="id_categoria_cancion" name="id_categoria_cancion">Categoria</label><span class="text-danger"> *</span>
                    <br>
                    <select class="form-control mb-2" name="id_categoria_cancion" v-model="id_categoria">
                        <option value="" selected> Seleccionar categoria</option>
                        <option></option>
                        <option value="1">Quevedo</option>
                        <option value="2">Bad Bunny</option>
                        <option value="3">Shakira</option>
                        <option value="4">Rosalía</option>
                        <option value="5">Eladio Carrión</option>
                        <option value="6">Karol G</option>
                    </select>
                  </div>

               <div class="form-gorup mb-2 mt-4">
                   <label class="mb-2">Imagen</label><span class="text-danger"> *</span>
                   <input type="file" class="form-control mb-2" v-on:change="onChange">
                   <div v-if="img">
                       <img class="mb-2" v-bind:src="imgPreview" width="100" height="100"/>
                   </div>
               </div>

               <div class="form-gorup mb-2 mt-4">
                   <label class="mb-2">Audio</label><span class="text-danger"> *</span>
                   <input type="file" class="form-control mb-2" v-on:change="onChangeAudio">
               </div>

               <button type="submit" class="fondo-color tamaño_session2 mt-4">Guardar cambios</button>

           </form>

          </div>
      </div>
  </div>

</template>

<script>
export default{
   data() {
       return {
           id:'',
           name: '',
           id_categoria: '',
           audio: '',
           img: '',
           strSuccess: '',
           strError: '',
           imgPreview: null,
           audioPreview: null
       }
   },

   created() {
       this.$axios.get('/sanctum/csrf-cookie').then(response => {
           this.$axios.get(`/api/edit/${this.$route.params.id}`)
               .then(response => {
                   this.name = response.data['name'];
                   this.id_categoria = response.data['id_categoria_cancion'];
                   this.audio = "/audio/Music/"+response.data['audio'];
                   this.img = "/img/Music_Imagenes/"+response.data['image'];
                   this.audioPreview = this.audio;
                   this.imgPreview = this.img;
               })
               .catch(function(error) {
                   console.log(error);
               });
       })
   },
   methods: {
       onChange(e) {
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

           if (this.audio) {
               if ( /\.(mp3)$/i.test( this.audio.name ) ) {
                   reader.readAsDataURL( this.audio );
               }
           }
       },
       updatePost(e) {
           this.$axios.get('/sanctum/csrf-cookie').then(response => {
               let existingObj = this;
               const config = {
                   headers: {
                       'content-type': 'multipart/form-data'
                   }
               }

               const formData = new FormData();
               formData.append('name', this.name);
               formData.append('id_categoria_cancion', this.id_categoria);
               formData.append('audio', this.audio);
               formData.append('file', this.img);
               this.$axios.post(`/api/update/${this.$route.params.id}`, formData, config)
                   .then(response => {
                       existingObj.strError = "";
                       existingObj.strSuccess = response.data.success;
                   })
                   .catch(function(error) {
                       existingObj.strSuccess ="";
                       existingObj.strError = error.response.data.message;
                   });
           });
       }
   },
   beforeRouteEnter(to, from, next) {
  if (!window.Laravel.isLoggedin) {
    window.location.href = "/";
  } else {
    let canAdd = false;

    // Bucle para comprobar si existe el rol 'editar' 'eliminar' o 'añadir'
    for (let role of window.Laravel.user.roles) {
      if (role.rol === 'editar') {
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
}

</script>
