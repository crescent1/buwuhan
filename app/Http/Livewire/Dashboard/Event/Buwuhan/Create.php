<?php

namespace App\Http\Livewire\Dashboard\Event\Buwuhan;

use App\Models\Guest;
use Auth;
use Livewire\Component;
use Validator;

class Create extends Component
{
    /**
     * set eentId
     *
     * @var integer
     */
    public $eventId;

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
        $this->state = [];
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function addBuwuhan()
    {
        $validData = Validator::make($this->state, [
            'gender' => 'required',
            'name' => 'required|string|min:2|max:100',
            'money' => 'required|min:0',
            'item' => 'nullable',
            'district' => 'required',
        ])->validate();

        $validData['event_id'] = $this->eventId;
        $validData['user_id'] = $this->userId;

        Guest::create($validData);

        $this->emit('EmitAddBuwuhan');
        $this->hideBuwuhan();
        session()->flash('success', 'Buwuhan berhasil ditambah');
    }
}
