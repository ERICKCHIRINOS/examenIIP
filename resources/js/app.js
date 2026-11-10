import '../scss/app.scss'

const toast = document.querySelector('.toast');

if (toast) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast);
    toastBootstrap.show();
}

import * as bootstrap from 'bootstrap'

import Alert from 'bootstrap/js/dist/alert';

import { Tooltip, Toast, Popover } from 'bootstrap';