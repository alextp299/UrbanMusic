<template>
  <div class="container-fluid mt-5 mb-5">
    <div class="row justify-content-center align-items-center">
    <div class="col-md-4">
    <div class="card card-default d-flex px-5 py-5">
      <div class="card-body p-1">
        <div class="d-flex justify-content-between pb-2 mb-2">
          <h5 class="card-title">Mi perfil</h5>
          <div>
            <router-link :to="{ name: 'editarperfil', params: { id: user.id } }" class="nav-item nav-link">
                    <div class="editar" aria-label="editar"></div>
                  </router-link>
          </div>
        </div>

        <form @submit.prevent="addPost" enctype="multipart/form-data">
          <div class="row">  

            <div class="col-md-12">
              <div class="form-group mb-2 mt-4">
                <label class="mb-2">Nombre</label>
                <p class="mt-1 ms-3" style="font-size: 14px;">{{ user.name }}</p>
              </div>

              <div class="form-group mb-2 mt-4">
                <label class="mb-2">Correo electrónico</label>
                <p class="mt-1 ms-3" style="font-size: 14px;">{{ user.email }}</p>
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
          <div class="d-flex justify-content-between mt-4">
            <router-link to="/" class="nav-item nav-link">
              <button class="fondo-color tamaño_session2">Volver al Inicio</button>
            </router-link>
            <div class="eliminar mx-2" @click="eliminar(user.id)"></div>
          </div>
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
      eliminar(id) {
    this.$axios.delete('/api/deleteUsuario/' + id)
      .then(response => {

        this.$axios.get('/api/usuarios')
          .then(response => {
            this.canciones = response.data;
          })
          .catch(function (error) {
            console.log(error);
          });
          window.location.href = '/';
        
      })
      .catch(error => {
        
      });
  }
}
}
</script>

<style scoped>

</style>