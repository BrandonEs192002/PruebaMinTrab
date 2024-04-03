<template>
  <div>
    <h2>Registro</h2>
    <form @submit.prevent="register">
      <div>
        <label for="name">Nombre:</label>
        <input type="text" id="name" v-model="name" required>
      </div>
      <div>
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" v-model="email" required>
      </div>
      <div>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" v-model="password" required>
      </div>
      <button type="submit">Registrarse</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      name: '',
      email: '',
      password: ''
    };
  },
  methods: {
    register() {
      axios.post('/register', {
        name: this.name,
        email: this.email,
        password: this.password
      })
      .then(response => {
        window.location.href = '/login';
        
      })
      .catch(error => {
        // Manejar el error, por ejemplo, mostrar un mensaje de error al usuario
        console.error('Error en el registro:', error.response.data);
      });
    }
  }
};
</script>
