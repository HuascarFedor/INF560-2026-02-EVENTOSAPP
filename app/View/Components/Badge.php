<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Badge extends Component
{
    public string $color;

    public function __construct(public string $categoria)
    {
        $this->color = match($categoria) {
            'Tecnologia'    => 'bg-blue-100 text-blue-700',
            'Cultura'       => 'bg-purple-100 text-purple-700',
            'Deporte'       => 'bg-emerald-100 text-emerald-700',
            'Finanzas'      => 'bg-pink-100 text-pink-700',
            default         => 'bg-slate-100 text-slate-700',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.badge');
    }
}
