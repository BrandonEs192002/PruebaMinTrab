<template>
  <div class="header">
    <nav>
      <ul>
        <li><a href="/">Inicio</a></li>
        <li v-if="!loggedIn"><a href="/login">Iniciar sesión</a></li>
        <li v-if="!loggedIn"><a href="/register">Registrarse</a></li>
        <li v-if="isTecnico">
          <a href="/accepted-forms">Formularios Aceptados</a>
        </li>
        <li v-if="isTecnico">
          <a href="/denied-forms">Formularios Denegados</a>
        </li>
        <li v-if="loggedIn">
          <button @click="logout">Cerrar sesión</button>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: {
    loggedIn: {
      type: Boolean,
      default: false
    },
    userName: {
      type: String,
      default: ''
    }
  },
  data() {
    return {
      userRole: ''
    };
  },
  computed: {
    isTecnico() {
      return this.userRole === 'tecnico';
    }
  },
  mounted() {
    // Lógica para obtener el rol del usuario en sesión
    axios.get('/api/user-role')
      .then(response => {
        this.userRole = response.data.role;
      })
      .catch(error => {
        console.error('Error al obtener el rol del usuario:', error);
      });
  },
  methods: {
    logout() {
      axios.post('/logout')
        .then(response => {
          // Una vez que la sesión se haya cerrado con éxito, redirige al usuario a la página de inicio de sesión
          window.location.href = '/login';
        })
        .catch(error => {
          console.error('Error al cerrar sesión:', error);
        });
    }
  }
};
</script>

<style scoped>
.header {
  background-color: #333;
  color: white;
  padding: 10px;
}

nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

nav ul li {
  display: inline;
  margin-right: 10px;
}

nav ul li a {
  color: white;
  text-decoration: none;
}
</style>
