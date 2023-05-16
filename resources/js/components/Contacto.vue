<template>
    <div class="container-fluid mt-5 mb-5">
      <h3 class="mb-4">Contacta con nosotros</h3>
      <div class="card card-default d-flex px-5 py-5">
            <div class="card-body p-1">
                <div class="d-flex justify-content-between pb-2 mb-2">
                    <h5 class="card-title">Formulario</h5>
                </div>
                <form  action="mailto:infomerchandising@urbanmusic.com"> 
                    <div class="form-group mb-2 mt-4">
                        <label for="nya" class="mb-2">Nombres y Apellidos</label><span class="text-danger"> *</span>
                        <input type="text" class="form-control mb-2" id="nya" placeholder="Introduce tu nombre y apellidos" required>
                        <div id="nyaHelp" class="form-text">Ejemplo: Carlos Torres Rojas</div>
                    </div>
  
                    <div class="form-group mb-2 mt-4">
                        <label for="email" class="mb-2">Correo Electrónico</label><span class="text-danger"> *</span>
                        <input type="email" class="form-control" id="email" placeholder="Introduce tu correo" required>
                        <div id="emailHelp" class="form-text">Ejemplo: miemail@mail.com</div>
                    </div>
    
                    <div class="form-gorup mb-2 mt-4">
                        <label for="asunto" class="mb-2">Asunto</label>
                        <input type="text" class="form-control mb-2" id="asunto" placeholder="Introduce el asunto" required>
                        <div id="asuntoHelp" class="form-text">Ejemplo: Reproducción incorrecta de la música</div>
                    </div>
    
                    <div class="form-gorup mb-2 mt-4">
                        <label for="mensaje" class="mb-2">Mensaje</label>
                        <textarea class="form-control" id="mensaje" rows="3" placeholder="Introduce el contenido de tu motivo para contactarnos" required></textarea>
                    </div>
    
                  <button type="submit" class="fondo-color tamaño_session2 mt-4">Enviar</button>
                  <button type="reset" class="fondo-color tamaño_session2 mt-4 mx-4">Limpiar</button>
    
                </form>
    
            </div>
        </div>
    </div>
  
  </template>

<script>
export default{
    name: "Contacto"
}
</script>

<style scoped>

</style>