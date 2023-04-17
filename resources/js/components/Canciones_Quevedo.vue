<template>
  <div>
    <h1>Canciones</h1>
    <ul>
      <li v-for="cancion in canciones" :key="cancion.id">
        {{ cancion.name }}
      </li>
    </ul>
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
           this.$axios.get('/api/categoria/Quevedo') 
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
