import './bootstrap';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
