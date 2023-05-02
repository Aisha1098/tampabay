<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|min:3|max:255|unique',
            'password' => 'required|min:7|max:255'
        ]);

        auth()->login(User::create($attributes));

        return redirect('/');
    }
}
