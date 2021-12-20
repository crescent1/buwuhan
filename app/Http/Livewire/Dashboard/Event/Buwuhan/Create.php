<?php

namespace App\Http\Livewire\Dashboard\Event\Buwuhan;

use Livewire\Component;

class Create extends Component
{
    /**
     * set status
     *
     * @var boolean
     */
    public $status = false;

    /**
     * set state
     *
     * @var array
     */
    public $state = [];

    /**
     * Undocumented function
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.dashboard.event.buwuhan.create');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function showBuwuhan()
    {
        $this->status = true;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function hideBuwuhan()
    {
        $this->status =false;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function addBuwuhan()
    {

        $this->hideBuwuhan();

    }
}
