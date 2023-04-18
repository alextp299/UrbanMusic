<template>
  <div>
    <h1>Canciones</h1>
    
    <table class="table table-hover table-sm">
        <thead class="bg-dark text-light">
            <tr>
                <th width="50" class="text-center">#</th>
                <th>Nombre</th>
                <th>Audio</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(cancion, index) in canciones" :key="index">
                <td class="text-center">{{ cancion.id }}</td>
                <td>{{ cancion.name }}</td>
                <td>
                    <div v-if="cancion.audio">
                        <audio controls>
                            <source v-bind:src="'/audio/' + cancion.audio" type="audio/mp3">
                            Tu navegador no soporta el elemento de audio.
                        </audio>
                    </div>
                </td>
                <td>{{ cancion.image }}</td>
            </tr>
        </tbody>
    </table>
  </div>
</template>

<script>
export default {
   data() {
       return {
           canciones: [],
           strSuccess: '',
           strError: ''
       }
   },
   created() {
       this.$axios.get('/sanctum/csrf-cookie').then(response => {
           this.$axios.get('/api/canciones') 
               .then(response => {
                   this.canciones = response.data;
               })
               .catch(function (error) {
                   console.log(error);
               });
           }
       );
   },
   methods: {

   }
}
</script>
