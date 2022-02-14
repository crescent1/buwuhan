<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Log;

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

    /**
     * edit user view
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            'user' => $user
        ]);

    }

    /**
     * update user
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validData = $request->validated();

        if ($validData['password']) {
            $user->name = $validData['name'];
            $user->email = $validData['email'];
            $user->type = $validData['type'];
            $user->password = $validData['password'];
            $user->save();
        } else {
            $user->name = $validData['name'];
            $user->email = $validData['email'];
            $user->type = $validData['type'];
            $user->save();
        }

        return redirect()->route('user.edit', $user->id)->with('status', 'User berhasil di update');

    }
}
