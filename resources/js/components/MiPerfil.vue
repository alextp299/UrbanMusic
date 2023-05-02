<template>
  <div class="container-fluid mt-5 mb-5">
    <h3 class="mb-4">Perfil de Usuario</h3>
    <div class="card card-default d-flex px-5 py-5">
      <div class="card-body p-1">
        <div class="d-flex justify-content-between pb-2 mb-2">
          <h5 class="card-title">Mi perfil</h5>
          <div>
            <router-link :to="{name: 'merchandising'}" class="nav-item nav-link mt-2">
              <button class="fondo-color tamaño_session2">Editar</button>
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

        <form @submit.prevent="addPost" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2 mt-4">
                <label class="mb-2">Nombre</label>
                <p class="mt-1 ms-3" style="font-size: 14px;">{{ user.name }}</p>
              </div>

              <div class="form-group mb-2 mt-4">
                <label class="mb-2">Correo electrónico</label>
                <p class="mt-1 ms-3" style="font-size: 14px;">{{ user.email }}</p>
              </div>
            </div>

            <div class="col-md-6">
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

          <router-link to="/" class="nav-item nav-link mt-2">
            <button class="fondo-color tamaño_session2">Volver</button>
          </router-link>
        </form>
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
      }
    }
}
</script>

<style scoped>

</style>