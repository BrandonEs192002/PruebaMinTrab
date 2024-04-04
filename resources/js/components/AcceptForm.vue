<template>
    <div class="container">
      <h2>Accept Form</h2>
      <div class="btn-group mb-3" role="group">
        <router-link to="/acceptd-forms" class="btn btn-primary">Formularios Aceptados</router-link>
        <router-link to="/deniend-forms" class="btn btn-danger">Formularios Denegados</router-link>
      </div>
      <div class="list-group">
        <a
          v-for="persona in personas"
          :key="persona.id"
          :href="'/form-view/' + persona.id"
          class="list-group-item list-group-item-action"
        >
        {{ persona.id }} {{ persona.primerNombre }} {{ persona.primerApellido }} 
        </a>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        personas: []
      };
    },
    methods: {
      loadPersonas() {
        axios.get('/api/personas', {
          params: {
            status: 'pendiente' // Filtrar solo personas con status "pendiente"
          }
        })
          .then(response => {
            this.personas = response.data;
          })
          .catch(error => {
            console.error('Error al obtener las personas:', error);
          });
      }
    },
    mounted() {
      this.loadPersonas();
    }
  };
  </script>
  
  <style scoped>
  </style>
  
