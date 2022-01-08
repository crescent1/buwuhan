<?php

namespace App\Http\Livewire\Dashboard\Event\Buwuhan;

use App\Models\Guest;
use Auth;
use Livewire\Component;
use Validator;

class Index extends Component
{
    /**
     * set
     *
     * @var bool
     */
    public $status = false;

    /**
     * set eentId
     *
     * @var integer
     */
    public $eventId;

    /**
     * set
     *
     * @var int
     */
    public $guestId;

    /**
     * set state
     *
     * @var array
     */
    public $state = [];

    /**
     * listener from other componenet
     *
     * @var array
     */
    protected $listeners = [
        'EmitAddBuwuhan' => '$refresh'
    ];

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
        return view('livewire.dashboard.event.buwuhan.index', [
            'guests' => Guest::whereEventId($this->eventId)->paginate(10),
        ]);
    }

    /**
     * Undocumented function
     *
     * @param Guest $guest
     * @return void
     */
    public function showEditGuest(Guest $guest)
    {
        $this->guestId = $guest->id;
        $this->state = $guest->toArray();
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
    public function updateBuwuhan()
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

        Guest::whereId($this->guestId)->update($validData);

        $this->hideBuwuhan();
        session()->flash('success', 'Buwuhan berhasil ditambah');
    }
}
