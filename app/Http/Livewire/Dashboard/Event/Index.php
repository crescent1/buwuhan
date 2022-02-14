<?php

namespace App\Http\Livewire\Dashboard\Event;

use App\Models\Event;
use Livewire\Component;
use Log;
use Validator;

class Index extends Component
{
    /**
     * set event id
     *
     * @var integer
     */
    public $eventId = null;

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
     * set searchEvent
     *
     * @var string
     */
    public $searchEvent;

    /**
     * listener from other componenet
     *
     * @var array
     */
    protected $listeners = [
        'EmitAddEvent' => '$refresh'
    ];

    /**
     * render
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        $events = Event::query();

        if ($this->searchEvent) {
            $events->where('name', 'like', '%' . $this->searchEvent . '%');
        }

        return view('livewire.dashboard.event.index', [
            'events' => $events->paginate(10),
        ]);
    }

    /**
     * Undocumented function
     *
     * @param integer $eventId
     * @return void
     */
    public function showDeleteEvent($eventId)
    {
        $this->eventId = $eventId;
        $this->dispatchBrowserEvent('showRemoveModalEvent');

    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function deleteEvent()
    {
        Event::whereId($this->eventId)->delete();

        $this->dispatchBrowserEvent('hideRemoveModalEvent');

        session()->flash('deleteEvent', 'Event berhasil di hapus!');

    }

    /**
     * Undocumented function
     *
     * @param Event $event
     * @return void
     */
    public function showEditEvent(Event $event)
    {
        $this->state = $event->toArray();
        $this->state['date'] = $event->date->format('Y-m-d\TH:i');
        $this->eventId = $event->id;
        $this->status = true;

    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function updateEvent()
    {
        $validData = Validator::make($this->state, [
            'name' => 'required|string|min:3|max:100',
            'date' => 'required'
        ])->validate();

        Event::whereId($this->eventId)->update($validData);

        $this->hideEditEvent();

        session()->flash('updateEvent', 'Event berhasil di update!');

    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function hideEditEvent()
    {
        $this->status = false;
    }
}
