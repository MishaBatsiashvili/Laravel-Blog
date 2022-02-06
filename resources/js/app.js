require('./bootstrap');
require('./category/category-dropdown');
// let ClassicEditor = require( '@ckeditor/ckeditor5-build-classic' );

const feather = require('feather-icons');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.addEventListener('load', () => {
    feather.replace();
});
