<template>
  <div>
    <h1>Productos</h1>
    <table class="table table-hover table-sm">
        <tbody>
            <tr v-for="(producto, index) in productos" :key="index">
                <td class="text-center">{{ producto.id }}</td>
                <td>{{ producto.name }}</td>
                <td>{{ producto.precio }}</td>
                <td>{{ producto.image }}</td>
            </tr>
        </tbody>
    </table>
  </div>
</template>

<script>
export default {
   data() {
       return {
           productos: [],
           strSuccess: '',
           strError: ''
       }
   },
   created() {
       this.$axios.get('/sanctum/csrf-cookie').then(response => {
           this.$axios.get('/api/productos') 
               .then(response => {
                   this.productos = response.data;
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
  
  <style scoped>
  
  </style>