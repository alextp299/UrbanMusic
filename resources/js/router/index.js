import { createWebHistory, createRouter } from "vue-router";
import Home from '../components/Home.vue';
import Register from '../components/Register.vue';
import Login from '../components/Login.vue';
import Categoria from '../components/Categoria.vue';
import Contacto from '../components/Contacto.vue';
import Privacidad from '../components/Privacidad.vue';
import Cookies from '../components/Cookies.vue';
import Aviso_Legal from '../components/Aviso_Legal.vue';
import Merchandising from '../components/Merchandising.vue';
import Canciones_Rosalia from '../components/Canciones_Rosalia.vue';
import Canciones_Quevedo from '../components/Canciones_Quevedo.vue';
import Canciones_EladioCarrión from '../components/Canciones_EladioCarrión.vue';
import Canciones_KarolG from '../components/Canciones_KarolG.vue';
import Canciones_BadBunny from '../components/Canciones_BadBunny.vue';
import Canciones_Shakira from '../components/Canciones_Shakira.vue';
import Merchandising_Rosalia from '../components/Merchandising_Rosalia.vue';
import Merchandising_BadBunny from '../components/Merchandising_BadBunny.vue';
import Merchandising_EladioCarrión from '../components/Merchandising_EladioCarrión.vue';
import Carrito from '../components/Carrito.vue';
import ConfirmaciónCompra from '../components/ConfirmaciónCompra.vue';
import AdminCanciones from '../components/AdminCanciones.vue';
import AdminProductos from '../components/AdminProductos.vue';
import MiPerfil from '../components/MiPerfil.vue';
import EditarPerfil from '../components/EditarPerfil.vue';
import FormularioAñadirProductos from '../components/FormularioAñadirProductos.vue';
import FormularioAñadirCanciones from '../components/FormularioAñadirCanciones.vue';
import FormularioEditarCanciones from '../components/FormularioEditarCanciones.vue';
import FormularioEditarProductos from '../components/FormularioEditarProductos.vue';
import FormularioAñadirUsuarios from '../components/FormularioAñadirUsuarios.vue';
import AdminUsers from '../components/AdminUsers.vue';
import FormularioEditarUsuarios from '../components/FormularioEditarUsuarios.vue';

export const routes = [{
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'categoria',
        path: '/categoria',
        component: Categoria
    },
    {
        name: 'contacto',
        path: '/contacto',
        component: Contacto
    },
    {
        name: 'politica_de_privacidad',
        path: '/politica_de_privacidad',
        component: Privacidad
    },
    {
        name: 'politica_de_cookies',
        path: '/politica_de_cookies',
        component: Cookies
    },
    {
        name: 'aviso_legal',
        path: '/aviso_legal',
        component: Aviso_Legal
    },
    {
        name: 'merchandising',
        path: '/merchandising',
        component: Merchandising
    },
    {
        name: 'canciones_rosalia',
        path: '/categoria/Rosalia',
        component: Canciones_Rosalia
    }, {
        name: 'canciones_quevedo',
        path: '/categoria/Quevedo',
        component: Canciones_Quevedo
    },
    {
        name: 'canciones_eladiocarrion',
        path: '/categoria/EladioCarrion',
        component: Canciones_EladioCarrión
    },
    {
        name: 'canciones_karolg',
        path: '/categoria/KarolG',
        component: Canciones_KarolG
    },
    {
        name: 'canciones_badbunny',
        path: '/categoria/BadBunny',
        component: Canciones_BadBunny
    },
    {
        name: 'canciones_shakira',
        path: '/categoria/Shakira',
        component: Canciones_Shakira
    },
    {
        name: 'merchandising_rosalia',
        path: '/merchandising/Rosalia',
        component: Merchandising_Rosalia
    },
    {
        name: 'merchandising_badbunny',
        path: '/merchandising/BadBunny',
        component: Merchandising_BadBunny
    },
    {
        name: 'merchandising_eladiocarrion',
        path: '/merchandising/EladioCarrion',
        component: Merchandising_EladioCarrión
    },
    {
        name: 'carrito',
        path: '/carrito',
        component: Carrito
    },
    {
        name: 'confirmacioncompra',
        path: '/finalizacioncompra',
        component: ConfirmaciónCompra
    },
    {
        name: 'admincanciones',
        path: '/admincanciones',
        component: AdminCanciones
    },
    {

        name: 'adminproductos',
        path: '/adminproductos',
        component: AdminProductos
    },
    {

        name: 'miperfil',
        path: '/miperfil',
        component: MiPerfil
    },
    {

        name: 'editarperfil',
        path: '/editarperfil',
        component: EditarPerfil
    },
    {

        name: 'formularioañadircanciones',
        path: '/formularioaddcanciones',
        component: FormularioAñadirCanciones
    },
    {

        name: 'formularioañadirproductos',
        path: '/formularioaddproductos',
        component: FormularioAñadirProductos
    },
    {

        name: 'formularioeditarcanciones',
        path: '/formularioeditarcanciones',
        component: FormularioEditarCanciones
    },
    {

        name: 'formularioeditarproductos',
        path: '/formularioeditarproductos',
        component: FormularioEditarProductos
    },
    {

        name: 'adminusers',
        path: '/adminusers',
        component: AdminUsers
    },

    {

        name: 'formularioañadirusuarios',
        path: '/formularioaddusuarios',
        component: FormularioAñadirUsuarios
    },

    {

        name: 'formularioeditarusuarios',
        path: '/formularioeditarusuarios',
        component: FormularioEditarUsuarios
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;