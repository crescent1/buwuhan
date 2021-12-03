<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Livewire\Component;
use Log;

class Index extends Component
{
    /**
     *
     *
     * @var integer
     */
    public $status = 1;

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
     * @param integer $userId
     * @return void
     */
    public function showDeleteUser($userId)
    {

        $this->idRemoveUser = $userId;
        $this->status = 2;
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
