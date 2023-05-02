<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        session()->regenerated();

        return redirect('/');
    }

    public function destroy(User $user){
        $user->logout();

        return redirect('/');
    }
}
