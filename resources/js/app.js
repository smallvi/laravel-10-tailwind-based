import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';
import FilePond from 'filepond';


FilePond.registerPlugin(
    FilePondPluginImagePreview,
);

window.FilePond = FilePond;