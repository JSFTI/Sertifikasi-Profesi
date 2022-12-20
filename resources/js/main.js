import 'uno.css';

import './bootstrap';
import 'micromodal/dist/micromodal';
import axios from 'axios';

axios.defaults.baseURL = window.BASE_API_URL;

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'

window.scrollToCurrentHome = function(el){
  const active = el.querySelector('.active-home');
  el.scrollLeft = active.offsetLeft;
}

window.handleClickedOverlay = function(el){
  const target = el.target;
  if(target.id === 'main-content' && window.innerWidth <= 1024){
    Alpine.store('sidebar').expanded = false;
  }
}

window.transformToInvalids = function(error){
  const errorBag = new Map();
  for(let key of Object.keys(error)){
    errorBag.set(key, error[key][0]);
  }

  return Object.fromEntries(errorBag);
}

window.axios = axios;
window.Alpine = Alpine;

Alpine.plugin(collapse);

Alpine.store('sidebar', {
  expanded: false,

  toggle(expanded = null){
    this.expanded = expanded === null ? !this.expanded : expanded;
  }
});

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
  MicroModal.init({
    disableScroll: true
  });
});