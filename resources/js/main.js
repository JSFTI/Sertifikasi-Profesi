import './bootstrap';

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'

window.Alpine = Alpine;

Alpine.plugin(collapse);

Alpine.store('sidebar', {
  expanded: false,
  current: null,

  toggle(expanded = null){
    this.expanded = expanded === null ? !this.expanded : expanded;
  }
});

Alpine.start();