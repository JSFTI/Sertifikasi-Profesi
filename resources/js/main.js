import 'uno.css';

import './bootstrap';
import 'micromodal/dist/micromodal';
import axios from 'axios';

axios.defaults.baseURL = window.BASE_API_URL;

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'
import intersect from '@alpinejs/intersect'

/**
 * Used to scroll sub-home page navbar to current sub-page
 */
window.scrollToCurrentHome = function(el){
  const active = el.querySelector('.active-home');
  el.scrollLeft = active.offsetLeft;
}

/**
 * Close sidebar if window size is less than 1024px and the overlay is clicked
 */
window.handleClickedOverlay = function(el){
  const target = el.target;
  if(target.id === 'main-content' && window.innerWidth <= 1024){
    Alpine.store('sidebar').expanded = false;
  }
}

window.handleLoadComment = function(articleId, nextPage, commentContainer){
  return new Promise((resolve) => {
    axios.get(`/articles/${articleId}/comments`, {params: { cursor: nextPage }}).then((res) => {
      const data = res.data.data;

      for(let comment of data){
        const div = document.createElement('div');
        div.className = 'rounded bg-primary p-3';
        div.innerHTML = `
          <span class='font-bold'>${ comment.name }</span>
          <div class='mt-3'>
            ${ comment.content }
          </div
        `;
        commentContainer.appendChild(div);
      }

      resolve(res.data.next_cursor);
    });
  });
}

/**
 * Take error from API and convert to key:value pair
 */
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
Alpine.plugin(intersect);

// Global sidebar store
Alpine.store('sidebar', {
  expanded: false,

  toggle(expanded = null){
    this.expanded = expanded === null ? !this.expanded : expanded;
  }
});

Alpine.start();

// MicroModal must be initiated after all DOM Content is loaded
document.addEventListener('DOMContentLoaded', () => {
  MicroModal.init({
    disableScroll: true
  });
});