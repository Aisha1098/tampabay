<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Group;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return [
            'events' => Event::first()
        ];
    }

    public function store(){
        Group::create(array_merge($this->validateGroup(),[
        ]));
    }

    public function update(Group $group){
        $attributes = $this->validateGroup($group);

        $group->update($attributes);

        return back();
    }

    public function delete (Group $group){
        $group->delete();

        return back();
    }

    protected function validateGroup(?Group $group = null): array {
        $event ??= new Group();

        return request()->validate([
            'name' => 'required',
            'desc' => 'required|min=20|max=225',
            'is_slack' => 'required',
        ]);
    }
}
