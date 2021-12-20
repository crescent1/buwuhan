<?php

namespace App\Http\Livewire\Dashboard\Event\Buwuhan;

use App\Models\Guest;
use Livewire\Component;

class Index extends Component
{
    /**
     * Undocumented function
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.dashboard.event.buwuhan.index', [
            'guests' => Guest::latest()->paginate(10),
        ]);
    }
}
