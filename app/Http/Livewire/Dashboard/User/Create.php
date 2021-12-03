<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Component;
use Log;
use Validator;

class Create extends Component
{
    /**
     * Undocumented variable
     *
     * @var array $state
     */
    public $state = [];

    /**
     * Undocumented function
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('livewire.dashboard.user.create');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function showAddUser()
    {
        $this->dispatchBrowserEvent('showModalUser');

    }

    /**
     * Undocumented function
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addUser()
    {
        $validData = Validator::make($this->state, [
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users',
            'type' => 'required',
            'password' => 'required|min:6'
        ])->validate();

        $validData['status'] = '1';

        User::create($validData);

        $this->dispatchBrowserEvent('hideModalUser');
        $this->state = [];

        return redirect()->route('user.index')->with('newUser', 'User berhasil ditambah.');
    }
}
