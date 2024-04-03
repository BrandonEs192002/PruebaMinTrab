<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h2>Inicia sesión</h2>
        <div class="card">
          <div class="card-body">
            <form @submit.prevent="login">
              <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" v-model="email" required>
              </div>
              <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" v-model="password" required>
              </div>
              <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      email: '',
      password: '',
    };
  },
  methods: {
    login() {
      axios.post('/login', {
        email: this.email,
        password: this.password
      })
      .then(response => {
        // Manejar la respuesta del servidor
        console.log(response.data);

        // Obtener el rol del usuario desde la respuesta
        const userRole = response.data.userRole;

        // Redirigir al usuario a la vista correspondiente según su rol
        if (userRole === 'normal') {
          window.location.href = '/fill-form';
        } else if (userRole === 'tecnico') {
          window.location.href = '/accept-form';
        }
      })
      .catch(error => {
        // Manejar el error, por ejemplo, mostrar un mensaje de error al usuario
        console.error('Error en el inicio de sesión:', error.response.data);
      });
    }
  }
};
</script>
