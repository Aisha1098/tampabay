<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Group;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $events = Event::OrderBy('started_at', 'DESC')->where('is_featured', true)->get();
        return $events;
    }

    public function about(){
        $credits = Group::where('is_credit', true)->get();
        return $credits;
    }
}
