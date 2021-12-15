<?php

namespace App\Http\Livewire\Dashboard\Event;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Validator;

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
     * set auth user id
     *
     * @var int|string|null
     */
    public $userId;

    /**
     * set booted
     *
     * @return void
     */
    public function booted()
    {
        $this->userId = Auth::id();
    }


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

    /**
     * Undocumented function
     *
     * @return void
     */
    public function hideAddEvent()
    {
        $this->status = false;
        $this->state = [];
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function addEvent()
    {
        $validData = Validator::make($this->state, [
            'name' => 'required|string|min:3|max:100',
            'date' => 'required'
        ])->validate();
        $validData['user_id'] = $this->userId;

        Event::create($validData);

        $this->emit('EmitAddEvent');
        $this->hideAddEvent();

        session()->flash('success', 'Event berhasil ditambah');
    }
}
