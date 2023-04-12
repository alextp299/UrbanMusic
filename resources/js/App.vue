<template>
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <router-link to="/" class="nav-item nav-link">Home</router-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" v-if="isLoggedin">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <router-link to="/dashboard" class="nav-item nav-link">Dashboard</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/posts" class="nav-item nav-link">xxxx</router-link>
            </li>
          </ul>
          <form class="d-flex">
            <a class="nav-item nav-link" style="cursor: pointer;" @click="logout">Logout</a>
          </form>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent"  v-else>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
            <router-link to="/dashboard" class="nav-item nav-link">Dashboard</router-link>
        </li>
        <li class="nav-item">
            <router-link to="/posts" class="nav-item nav-link">xxxx</router-link>
        </li>
        </ul>
            <router-link to="/login" class="nav-item nav-link">Login</router-link>
            <router-link to="/register" class="nav-item nav-link">Register</router-link>
        </div>
      </div>
    </nav>
    
    
           
    
            <router-view></router-view>
    </div>
    </template>
 <script>
 export default {
    name: "App",
    data() {
        return {
            isLoggedin: false,
        }
    },
    created() {
        if(window.Laravel.isLoggedin){
            this.isLoggedin =true;
        }
    },
    methods: {
        logout(e) {
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('api/logout')
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = "/"
                        } else {
                            console.log(response);
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
 
 
        }
    },
 }
 </script> 