<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function loginPage() {
        return view('home');
    }

    public function login(Request $request) {
        // Validate user input
        $creds = $request->validate([
            "name" => ["required"],
            "password" => ["required"]
        ]);

        // Attempt authentication using Laravel Auth system
        if (auth()->attempt($creds)) {
            $request->session()->regenerate();
            return redirect('/page1');
        }

        return back()->with('error', 'Invalid username or password');
    }

    public function registerPage() {
        return view('register');
    }

    public function register(Request $request) {
        $incomingData = $request->validate([
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "email", "max:255"],
            "password" => ["required", "string", "min:3"]
        ]);

        $incomingData["password"] = bcrypt($incomingData["password"]);

        // Create user
        $user = User::create($incomingData);

        // Auto-login (same as professor)
        auth()->login($user);

        // Redirect home
        return redirect("/");
    }

    public function page1() {
    // Check if user is logged in
    if (!session('user_id')) {
        return view('page1')->with('notLogged', true);
    }

    // If logged in, get the user
    $user = User::find(session('user_id'));

    return view('page1', [
        'user' => $user,
        'notLogged' => false
    ]);
}

}
