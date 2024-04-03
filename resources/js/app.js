/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

import Header from './components/Header.vue';
app.component('header-component', Header);

import Login from './components/Login.vue';
app.component('login-component', Login);

import Register from './components/Register.vue';
app.component('register-component', Register);

import FormPersona from './components/FormPersona.vue';
app.component('form-persona-component', FormPersona);

import AcceptForm from './components/AcceptForm.vue';
app.component('accept-persona-component', AcceptForm);

import FormView from './components/FormView.vue';
app.component('form-view-component', FormView);

import AcceptedForms from './components/AcceptedForms.vue';
app.component('accepted-form-component', AcceptedForms);

import DeniedForms from './components/DeniedForms.vue';
app.component('denied-form-component', DeniedForms);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');