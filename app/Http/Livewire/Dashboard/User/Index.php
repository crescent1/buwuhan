<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Component;
use Log;

class Index extends Component
{
    /**
     * listener
     *
     * @var array
     */
    protected $listeners =[
        // 'addNewUser' => '$refresh'
    ];

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.dashboard.user.index', [
            'users' => User::latest()->paginate(10),
        ]);
    }

}
