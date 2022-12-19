import './bootstrap';

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'

window.scrollToCurrentHome = function(el){
  const active = el.querySelector('.active-home');
  el.scrollLeft = active.offsetLeft;
}

window.Alpine = Alpine;

Alpine.plugin(collapse);

Alpine.store('sidebar', {
  expanded: false,
  current: null,

  toggle(expanded = null){
    this.expanded = expanded === null ? !this.expanded : expanded;
  }
})

Alpine.start();