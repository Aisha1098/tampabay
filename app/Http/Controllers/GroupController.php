<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GroupController extends Controller
{
    public function index(){
        return Group::get();
    }

    public function slack(){
        $slacks = Group::where('is_slack', true)->get();
        return $slacks;
    }


}
