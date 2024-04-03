<template>
    <div class="container">
        <h2>Form View {{ item.id }} de {{ item.primerNombre }} {{ item.primerApellido }}</h2>
        <div class="card">
            <div class="card-body">
                <div v-if="item">
                    <p><strong>ID:</strong> {{ item.id }}</p>
                    <p><strong>Fecha de Nacimiento:</strong> {{ item.fechaNacimiento }}</p>
                    <p><strong>Primer Nombre:</strong> {{ item.primerNombre }}</p>
                    <p><strong>Segundo Nombre:</strong> {{ item.segundoNombre }}</p>
                    <p><strong>Primer Apellido:</strong> {{ item.primerApellido }}</p>
                    <p><strong>Segundo Apellido:</strong> {{ item.segundoApellido }}</p>
                    <p><strong>Estado Civil:</strong> {{ item.estadoCivil }}</p>
                    <p><strong>Teléfono:</strong> {{ item.telefono }}</p>
                    <p><strong>Email:</strong> {{ item.email }}</p>
                    <p><strong>Dirección:</strong> {{ item.direccion }}</p>
                    <p><strong>Departamento:</strong> {{ item.departamento}}</p>
                    <p><strong>Municipio:</strong> {{ item.municipio }}</p>
                    <p><strong>Archivo PDF:</strong> <a :href="getPDFUrl(item.archivoPDF)" target="_blank">Ver PDF</a></p>
                    
                    <div class="btn-group" role="group" aria-label="Form Actions">
                        <button type="button" class="btn btn-success" @click="acceptForm">Aceptar Formulario</button>
                        <button type="button" class="btn btn-danger" @click="rejectForm">Denegar Formulario</button>
                    </div>
                </div>
                <div v-else>
                    <p>Elemento no encontrado.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        id: {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            item: {}
        };
    },
    methods: {
        loadItem() {
            axios.get(`/api/personas/${this.id}`)
                .then(response => {
                    this.item = response.data;
                })
                .catch(error => {
                    console.error('Error al obtener la persona:', error);
                });
        },
        getPDFUrl(filename) {
            return `/api/personas/pdf/${filename}`;
        },
        acceptForm() {
      axios.post(`/form/${this.id}/accept`)
        .then(response => {
          console.log('Formulario aceptado');
          window.location.href = '/accept-form'; // Redirigir a la vista de formularios aceptados
        })
        .catch(error => {
          console.error('Error al aceptar el formulario:', error);
        });
    },
    rejectForm() {
      axios.post(`/form/${this.id}/reject`)
        .then(response => {
          console.log('Formulario denegado');
          window.location.href = '/accept-form'; // Redirigir a la vista de formularios denegados
        })
        .catch(error => {
          console.error('Error al denegar el formulario:', error);
        });
    },
    },
    mounted() {
        this.loadItem();
    }
};
</script>

<style scoped>
.card {
    margin-top: 20px;
}
</style>
