<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\FAQ;
use App\Models\Group;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class EventController extends Controller
{
    public function index(){
        return Event::orderBy('s', 'DESC')->get();
    }

    public function show(Event $event){
        $faq = FAQ::where('active',true)->get();
        $groups = $event->host()->get();
        return compact('event','faq','groups');
    }

    public function hangout(){
        $event = Event::OrderBy('started_at')->first()->get();
        $faq = FAQ::where('active',true)->get();
        // $groups = $event->host()->get();
        // return compact('event','faq','groups');
        return compact('event','faq');
    }
}
