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
import Canciones from '../components/Canciones.vue';
import Productos from '../components/Productos.vue';

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
        path: '/miperfil/editar',
        component: EditarPerfil
    },
    {

        name: 'formularioañadircanciones',
        path: '/admincanciones/add',
        component: FormularioAñadirCanciones
    },
    {

        name: 'formularioañadirproductos',
        path: '/adminproductos/add',
        component: FormularioAñadirProductos
    },
    {

        name: 'formularioeditarcanciones',
        path: '/admincanciones/edit',
        component: FormularioEditarCanciones
    },
    {

        name: 'formularioeditarproductos',
        path: '/adminproductos/edit',
        component: FormularioEditarProductos
    },
    {

        name: 'adminusers',
        path: '/adminusers',
        component: AdminUsers
    },

    {
        name: 'formularioañadirusuarios',
        path: '/adminusers/add',
        component: FormularioAñadirUsuarios
    },

    {

        name: 'formularioeditarusuarios',
        path: '/adminusers/edit',
        component: FormularioEditarUsuarios
    },

    {
        name: 'canciones',
        path: '/canciones/:id_categoria',
        component: Canciones
    },
    {
        name: 'productos',
        path: '/productos/:id_categoria',
        component: Productos
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;