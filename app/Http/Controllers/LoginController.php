<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public $userRepository;

    public function __construct(UserInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function login() {
        return view('admin.login');
    }

    public function authenticate(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.assets');
        }

        return back()->with('danger', 'Invalid credentials.');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function dashboard() {
        return view('admin.dashboard');
    }

}
