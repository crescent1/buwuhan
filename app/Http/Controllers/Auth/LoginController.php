<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('dashboard.Auth.login');
    }

    public function processLogin(Request $request)
    {
        /**
         * validasi
         *
         * @var array $auth
         */
        $auth = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($auth)) {

            // /**
            //  * @var User $user
            //  */
            // $user = Auth::user();

            return redirect()->route('dashboard');

        }

        return redirect()->route('login')->with('message', 'Email atau password salah');

    }

    /**
     * logout user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');

    }
}
