import './bootstrap';
import dashboard from "./components/dashboard";

import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.data('dashboard', dashboard);
Alpine.start();

import.meta.glob([
  '../assets/**',
]);
