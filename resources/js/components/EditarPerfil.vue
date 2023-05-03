<template>
  <div class="container-fluid mt-5 mb-5">
    <div class="row justify-content-center align-items-center">
    <div class="col-md-4">
    <div class="card card-default d-flex px-5 py-5">
      <div class="card-body p-1">
        <div class="d-flex justify-content-between pb-2 mb-2">
          <h5 class="card-title">Editar perfil</h5>
          <div>
            <router-link :to="{name: 'miperfil'}" class="nav-item nav-link mt-2">
              <button class="fondo-color tamaño_session2">Mi perfil</button>
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

        <form @submit.prevent="editPost" enctype="multipart/form-data">
          <div class="row m-5">  

            <div class="col-md-12">
              <div class="form-group mb-2 mt-4">
                <label class="mb-2">Nombre Anterior</label>
                <p class="mt-1 ms-3" style="font-size: 14px;">{{ user.name }}</p>
                <input type="text" class="form-control" v-model="last_name" placeholder="Introduce el nombre anterior">
              </div>

              <div class="form-group mb-2 mt-4">
                <label class="mb-2">Nombre Nuevo</label>
                <input type="text" class="form-control" v-model="new_name" placeholder="Introduce el nuevo nombre">
              </div>

              <div class="form-group mb-2 mt-4">
                <label class="mb-2">Correo electrónico</label>
                <input type="text" class="form-control mb-2" v-model="editEmail" placeholder="Introduce el nuevo correo">
              </div>

              <div class="form-group mb-2 mt-4">
                <label class="mb-2" for="id_categoria" name="id_categoria">Cliente desde...</label>
                <p class="mt-1 ms-3" style="font-size: 14px;">{{ formatDate(user.created_at) }}</p>
              </div>

              <div class="form-group mb-2 mt-4">
                <label class="mb-2" for="id_categoria" name="id_categoria">Última actualización de perfil el...</label>
                <p class="mt-1 ms-3" style="font-size: 14px;">{{ formatDate(user.updated_at) }}</p>
              </div>
            </div>
          </div>

          <button type="submit" class="fondo-color tamaño_session2 mb-4">Guardar cambios</button>

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
            last_name: '',
            new_name: '',
            editEmail: '',
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
      editPost(e) {
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
              formData.append('email', this.editEmail);
        

              this.$axios.post('/api/editUser', formData, config)
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

<style scoped>

</style>