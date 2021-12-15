<?php

namespace App\Http\Livewire\Dashboard\Event;

use Livewire\Component;

class Index extends Component
{
    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.dashboard.event.index', [
            'events' => []
        ]);
    }
}
