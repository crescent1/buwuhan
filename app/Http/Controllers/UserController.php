<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * view user
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('dashboard.user.index');
    }

    // public function create()
    // {

    // }

    // public function store()
    // {

    // }

    // public function edit()
    // {

    // }

    // public function update()
    // {

    // }

    // public function destroy()
    // {

    // }
}
