<template>
    <div class="container">
      <h2>Formulario de Persona</h2>
      <form @submit.prevent="submitForm">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <input type="date" class="form-control" placeholder="Fecha de Nacimiento" v-model="fechaNacimiento" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Primer Nombre" v-model="primerNombre" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Segundo Nombre" v-model="segundoNombre">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Primer Apellido" v-model="primerApellido" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Segundo Apellido" v-model="segundoApellido">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Estado Civil" v-model="estadoCivil">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <input type="number" class="form-control" placeholder="Número telefónico" v-model="telefono" max="99999999" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Correo Electrónico" v-model="email" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Confirmar Correo Electrónico" v-model="confirmarEmail" required>
              <div v-if="email !== confirmarEmail" class="invalid-feedback">Los correos electrónicos no coinciden</div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Dirección" v-model="direccion">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="departamento">Departamento:</label>
              <select v-model="departamento" id="departamento" class="form-control" @change="loadMunicipios">
                <option value="">Selecciona un departamento</option>
                <option v-for="depto in departamentos" :key="depto.id" :value="depto">{{ depto.nombre }}</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="municipio">Municipio:</label>
              <select v-model="municipio" id="municipio" class="form-control">
                <option value="">Selecciona un municipio</option>
                <option v-for="mun in municipios" :key="mun.id" :value="mun">{{ mun.nombre }}</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
    <label for="archivoPDF">Subir archivo PDF (máximo 1 MB):</label>
    <input type="file" class="form-control-file" name="archivoPDF" accept=".pdf" @change="handleFileUpload">
    <small class="form-text text-muted">Tamaño máximo: 1 MB</small>
</div>

        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        fechaNacimiento: '',
        primerNombre: '',
        segundoNombre: '',
        primerApellido: '',
        segundoApellido: '',
        estadoCivil: '',
        telefono: '',
        email: '',
        confirmarEmail: '',
        direccion: '',
        departamento: '',
        municipio: '',
        departamentos: [],
        municipios: [],
        archivoPDF: null // Agregamos el campo para almacenar el archivo PDF
      };
    },
    mounted() {
      this.loadDepartamentos();
    },
    methods: {
      loadDepartamentos() {
        axios.get('/api/departamentos')
          .then(response => {
            this.departamentos = response.data;
          })
          .catch(error => {
            console.error('Error al obtener los departamentos:', error);
          });
      },
      loadMunicipios() {
        if (this.departamento) {
          axios.get(`/api/departamentos/${this.departamento.id}/municipios`)
            .then(response => {
              this.municipios = response.data;
            })
            .catch(error => {
              console.error('Error al obtener los municipios:', error);
            });
        } else {
          this.municipios = [];
        }
      },
      submitForm() {
        // Crear objeto FormData
        const formData = new FormData();
        formData.append('fechaNacimiento', this.fechaNacimiento);
        formData.append('primerNombre', this.primerNombre);
        formData.append('segundoNombre', this.segundoNombre);
        formData.append('primerApellido', this.primerApellido);
        formData.append('segundoApellido', this.segundoApellido);
        formData.append('estadoCivil', this.estadoCivil);
        formData.append('telefono', this.telefono);
        formData.append('email', this.email);
        formData.append('confirmarEmail', this.confirmarEmail);
        formData.append('direccion', this.direccion);
        formData.append('departamento', this.departamento);
        formData.append('municipio', this.municipio);
        console.log(this.archivoPDF)
        formData.append('archivoPDF', this.archivoPDF);
  
        // Enviar solicitud POST con axios
        axios.post('/fill-form', formData)
        
        .then(response => {
          console.log('Respuesta del servidor:', response.data);
          // Restablecer campos del formulario después de enviar
          this.resetForm();
          window.location.href = '/';
        })
        .catch(error => {
          console.error('Error al enviar formulario:', error);
        });
      },
      handleFileUpload(event) {
        this.archivoPDF = event.target.files[0]; // Asignar archivo seleccionado al data
      },
      resetForm() {
        // Restablecer valores de los campos del formulario
        this.fechaNacimiento = '';
        this.primerNombre = '';
        this.segundoNombre = '';
        this.primerApellido = '';
        this.segundoApellido = '';
        this.estadoCivil = '';
        this.telefono = '';
        this.email = '';
        this.confirmarEmail = '';
        this.direccion = '';
        this.departamento = '';
        this.municipio = '';
        this.archivoPDF = null;
      }
    }
  };
  </script>
  
  <style scoped>
  .form-group input {
    border: none;
    border-bottom: 1px solid #ced4da;
    border-radius: 0;
    padding: 20px 0px;
  }
  </style>
