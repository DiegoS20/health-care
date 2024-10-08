<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Table extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $headers,
        public array $tableData,
        public string $editRoute,
        public string $deleteRoute,
        public string $paramName
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table');
    }
}
