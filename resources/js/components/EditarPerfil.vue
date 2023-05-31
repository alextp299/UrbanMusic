<template>
  <div class="container-fluid mt-5 mb-5">
    <div class="row justify-content-center align-items-center">
    <div class="col-md-4">
    <div class="card card-default d-flex px-5 py-5">
      <div class="card-body p-1">
        <div class="d-flex justify-content-between pb-2 mb-2">
          <h5 class="card-title">Editar perfil</h5>
          <div>
            <router-link :to="{name: 'miperfil'}" class="nav-item nav-link">
              <button class="fondo-color tamaño_session2">Volver</button>
            </router-link>
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
          <div class="row">  

            <div class="col-md-12">

              <div class="form-group mb-2 mt-4">
                <label class="mb-2">Nombre</label><span class="text-danger"> *</span>
                <p class="mt-1 ms-3" style="font-size: 14px;">{{ user.name }}</p>
                <input type="text" class="form-control" v-model="name" placeholder="Introduce el nuevo nombre">
              </div>

              <div class="form-group mb-2 mt-4">
                <label class="mb-2">Correo electrónico</label><span class="text-danger"> *</span>
                <p class="mt-1 ms-3" style="font-size: 14px;">{{ user.email }}</p>
                <input type="text" class="form-control mb-2" v-model="email" placeholder="Introduce el nuevo correo">
              </div>

              <div class="form-group mb-2 mt-4">
                <label class="mb-2" for="password" name="id_categoria">Contraseña Nueva</label>
                <input id="password" type="password" class="form-control mb-2" v-model="password" placeholder="Introduce la nueva contraseña">
              </div>

              <div class="form-group mb-2 mt-4">
                <label class="mb-2" for="id_categoria" name="id_categoria">Última actualización de perfil el...</label>
                <p class="mt-1 ms-3" style="font-size: 14px;">{{ formatDate(user.updated_at) }}</p>
              </div>
            </div>
          </div>

          <button type="submit" class="fondo-color tamaño_session2 mt-4">Guardar cambios</button>

        </form>
      </div>
      </div>
      </div>

    </div>

      
  </div>
</template>

<script>
export default{
    name: "MiPerfil",
    data() {
        return {
            isLoggedin: false,
            user: null,
            name: '',
            email: '',
            password: '',
            strSuccess: '',
            strError: '',
        }
    },
    created() {
        if(window.Laravel.isLoggedin){
            this.isLoggedin =true;
            this.user =window.Laravel.user;
        }
    },
    methods: {
      formatDate(date) {
        const options = {
          year: 'numeric', month: 'numeric', day: 'numeric',
          hour: 'numeric', minute: 'numeric', second: 'numeric',
          hour12: false,
          timeZone: 'UTC'
        };
        return new Date(date).toLocaleString('es-ES', options);
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
          formData.append('email', this.email);
          formData.append('password', this.password);
              

          this.$axios.post(`/api/updateUsuario/${this.$route.params.id}`, formData, config)
          .then(response => {
                       existingObj.strError = "";
                       existingObj.strSuccess = response.data.success;
                   })
                   .catch(function(error) {
                       existingObj.strSuccess ="";
                       existingObj.strError = error.response.data.message;
                   });
        });

      },
      beforeRouteEnter(to, from, next) {
       if (!window.Laravel.isLoggedin) {
           window.location.href = "/";
       }
       next();
   }

    }
}
</script>

<style scoped>

</style>