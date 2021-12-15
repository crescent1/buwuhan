<?php

namespace App\Http\Livewire\Dashboard\Event;

use Livewire\Component;

class Create extends Component
{
    /**
     * set status
     *
     * @var boolean
     */
    public $status = true;


    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.dashboard.event.create');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function showAddForm()
    {
        $this->status = true;
    }
}
