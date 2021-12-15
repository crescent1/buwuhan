<?php

namespace App\Http\Livewire\Dashboard\Event;

use App\Models\Event;
use Livewire\Component;

class Index extends Component
{
    /**
     * listener from other componenet
     *
     * @var array
     */
    protected $listeners = [
        'EmitAddEvent' => '$refresh'
    ];

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.dashboard.event.index', [
            'events' => Event::latest()->paginate(10),
        ]);
    }
}
