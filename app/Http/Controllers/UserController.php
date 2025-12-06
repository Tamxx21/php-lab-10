<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginPage() {
        return view('home');
    }

    public function login(Request $request) 
    {
        $creds = $request->validate([
            "name" => ["required"],
            "password" => ["required"]
        ]);

        if (auth()->attempt($creds)) {
            $request->session()->regenerate();
            return redirect('/page1');
        }

        return back()->with('error', 'Invalid username or password');
    }

    public function registerPage() {
        return view('register');
    }

    public function register(Request $request) 
    {
        $incomingData = $request->validate([
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "email", "max:255"],
            "password" => ["required", "string", "min:3"]
        ]);

        $incomingData["password"] = bcrypt($incomingData["password"]);

        $user = User::create($incomingData);

        auth()->login($user);

        return redirect("/");
    }

    public function page1() 
    {
        if (!auth()->check()) {
            return view('page1', [
                'notLogged' => true,
                'user' => null
            ]);
        }

        return view('page1', [
            'notLogged' => false,
            'user' => auth()->user()
        ]);
    }
}
