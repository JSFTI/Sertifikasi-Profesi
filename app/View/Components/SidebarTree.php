<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Programmatically generate sidebar tree. This component will call itself
 * if an item has children (recursive component)
 */
class SidebarTree extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public array $items,
        public int $level = 1,
        public bool $expanded = false,
    ){}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar-tree');
    }
}
