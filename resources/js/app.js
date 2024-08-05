import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
    // Código a ejecutar cuando el DOM esté listo
    console.log('El DOM ha sido cargado completamente.');
});
