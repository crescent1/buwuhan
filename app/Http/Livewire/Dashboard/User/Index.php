<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Component;
use Log;
use Validator;

class Index extends Component
{
    /**
     * Undocumented variable
     *
     * @var array $state
     */
    public $state;

    /**
     * Undocumented variable
     *
     * @var integer
     */
    public $userId;

    /**
     * Undocumented variable
     *
     * @var integer
     */
    public $idRemoveUser = null;

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

    /**
     * Undocumented function
     *
     * @param User $user
     * @return void
     */
    public function showEditUser(User $user)
    {

        $this->state = $user->toArray();
        $this->userId = $user->id;

        $this->dispatchBrowserEvent('showEditModal');

    }

    /**
     * Undocumented function
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUser()
    {
        $validData = Validator::make($this->state, [
            'id' => 'required',
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'type' => 'required',
            'password' => 'sometimes|min:6',
            'status' => 'required'
        ])->validate();

        User::whereId($this->userId)->update($validData);

        $this->dispatchBrowserEvent('hideEditModal');

        return redirect()->route('user.index')->with('updateUser', 'User berhasil diupadate.');
    }

    /**
     * Undocumented function
     *
     * @param integer $userId
     * @return void
     */
    public function showDeleteUser($userId)
    {

        $this->idRemoveUser = $userId;
        $this->dispatchBrowserEvent('showRemoveModal');

    }

    /**
     * Undocumented function
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser()
    {
        User::whereId($this->idRemoveUser)->delete();

        $this->dispatchBrowserEvent('hideRemoveModal');

        return redirect()->route('user.index')->with('deleteUser', 'User berhasil dihapus.');

    }

}
