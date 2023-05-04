<template>
    <div class="container-fluid mt-5 mb-5">
      <h3 class="mb-4">Shakira</h3>
      <div>
        <router-link :to="{name: 'formularioañadircanciones'}" class="nav-item nav-link mt-2"><button class="fondo-color tamaño_session2">Añadir</button></router-link>
        <router-link :to="{name: 'formularioeditarcanciones'}" class="nav-item nav-link mt-2"><button class="fondo-color tamaño_session2">Editar</button></router-link>
      </div>
      <div class="row">
        <div class="col-md-4" v-for="(cancion, index) in canciones" :key="index">
          <div class="card mb-5">
            <img class="card-img-top" v-bind:src="'/img/Music_Shakira/' + cancion.image" alt="Portada de la canción">
            <div class="card-body">
              <h5 class="card-title">{{ cancion.name }}</h5>
              <audio controls class="mb-3">
                <source v-bind:src="'/audio/Shakira/' + cancion.audio" type="audio/mp3">
                Tu navegador no soporta el elemento de audio.
              </audio>
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
          id: '',
          name: '',
          audio: '',
          img: '',
          id_categoria: '',
          last_name: '',
          new_name: '',
          editAudio: '',
          editId_categoria: '',
          editImage: '',
          strSuccess: '',
          strError: '',
          imgPreview: null,
          imgEditPreview: null,
          audioPreview: null,
          audioEditPreview: null
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
      },onChangeEditAudio(e) {
          this.editAudio = e.target.files[0];
          let reader = new FileReader();
          reader.addEventListener("load", function () {
              this.audioPreview = reader.result;
          }.bind(this), false);


          if (this.editAudio) {
              if ( /\.(mp3)$/i.test( this.editAudio.name ) ) {
                  reader.readAsDataURL( this.editAudio );
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
      },delCancion(e) {
          this.$axios.get('/sanctum/csrf-cookie').then(response => {
              let existObj = this;
              const config = {
                  headers:{
                      'content-type': 'multipart/form-data'
                  }
              }
              
              const formData = new FormData();
              formData.append('name', this.id);

              this.$axios.post('/api/delCancion', formData, config)
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
      },editCancion(e) {
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
              formData.append('audio', this.editAudio);
              formData.append('id_categoria_cancion', this.editId_categoria);
              formData.append('file', this.editImage);
        

              this.$axios.post('/api/editCancion', formData, config)
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