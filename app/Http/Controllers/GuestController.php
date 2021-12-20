<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * index
     *
     * @param integer $eventId
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index($eventId)
    {
        return view('dashboard.event.buwuhan.index', [
            'eventId' => $eventId,
        ]);

    }
}
