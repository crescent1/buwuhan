<?php

namespace App\Http\Livewire\Dashboard\Event\Buwuhan;

use App\Models\Guest;
use Livewire\Component;

class Index extends Component
{
    /**
     * set eentId
     *
     * @var integer
     */
    public $eventId;

    /**
     * listener from other componenet
     *
     * @var array
     */
    protected $listeners = [
        'EmitAddBuwuhan' => '$refresh'
    ];

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
