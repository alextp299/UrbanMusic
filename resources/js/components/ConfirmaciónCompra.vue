<template>
  <div class="container-fluid mt-5 mb-5">
    
    <h3>Finalización de la compra</h3>
    <br><br>
    <h4 class="text-center">¡Gracias por su compra!</h4>
    <br>
    <p class="mt-2 text-center">
      Cualquier consulta o duda que tenga, pongase en contacto con nosotros a este email: <br><br> <a class="nav-item nav-link" href="mailto:infomerchandising@urbanmusic.com">infomerchandising@urbanmusic.com</a>

    </p>

  </div>
</template>

<script>
export default {
data() {
    return {
        isLoggedin: false,
        user: null,
        
    }
},created() {
        if(window.Laravel.isLoggedin){
            this.isLoggedin =true;
            this.user =window.Laravel.user;
        }
      },
 beforeRouteEnter(to, from, next) {
  if (!window.Laravel.isLoggedin) {
    window.location.href = "/";
  } else {
    let canAdd = false;

    // Bucle para comprobar si existe el rol 'editar' 'eliminar' o 'añadir'
    for (let role of window.Laravel.user.roles) {
      if (role.rol === 'normal') {
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

<style scoped>

</style>