<template>
    <div class="container-fluid mt-5 mb-5">
      <h3 class="mb-4">Merchandising</h3>
      
      <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between pb-2 mb-2">
                <h5 class="card-title">All Posts Data</h5>
                <div>
                    <button class="btn btn-success" type="button" @click="this.$router.push('/posts/add')">New Post</button>
                </div>
            </div>
 
 
            <table class="table table-hover table-sm">
                <thead class="bg-dark text-light">
                <tr>
                    <th width="50" class="text-center">#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th class="text-center" width="120">Image</th>
                    <th class="text-center" width="200">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(post, index) in posts" :key="post.id">
                    <td class="text-center">{{index}}</td>
                    <td>{{post.name}}</td>
                    <td>{{post.description}}</td>
                    <td class="text-center">
                        <div v-if="post.image">
                            <img alt="post-img" width="100" v-bind:src="'/img/' + post.image">
                        </div>
                    </td>
                    <td class="text-center">
                       <!-- <router-link :to="{name:'editpost'}" class="btn btn-warning">Edit</router-link>-->
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

        <div class="row align-items-start">
        <div class="col-lg-4 mt-5 mb-5 container">
          <img src="../../img/Artistas/rosalia.webp" class="d-block mx-auto image" alt="Rosalia">
          <div class="middle">
            <router-link to="/merchandising/Rosalia" class="nav-item nav-link mt-3"><button class="fondo-color tamaño_session">Entrar</button></router-link>
          </div>
          <p class="text-center mt-2">Rosalia</p>
      </div>
        <div class="col-lg-4 mt-5 mb-5 container">
            <img src="../../img/Artistas/badbunny.webp" class="d-block  mx-auto image" alt="Bad Bunny">
            <div class="middle">
            <router-link to="/merchandising/BadBunny" class="nav-item nav-link mt-3"><button class="fondo-color tamaño_session">Entrar</button></router-link>
          </div>
            <p class="text-center mt-2">Bad Bunny</p>
        </div>
        <div class="col-lg-4 mt-5 mb-5 container">
          <img src="../../img/Artistas/eladio.webp" class="d-block  mx-auto image" alt="Eladio Carrión">
          <div class="middle">
            <router-link to="/merchandising/EladioCarrion" class="nav-item nav-link mt-3"><button class="fondo-color tamaño_session">Entrar</button></router-link>
          </div>
          <p class="text-center mt-2">Eladio Carrión</p>
      </div>
      </div>
    </div>
 </template>
 
 <script>
 export default {
    data() {
        return {
            posts: [],
            strSuccess: '',
            strError: ''
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/posts')
                .then(response => {
                    this.posts = response.data;
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
 
 