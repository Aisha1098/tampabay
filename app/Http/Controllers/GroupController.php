<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GroupController extends Controller
{
    public function index(){
        return [
            'groups' =>Group::all()
        ];
    }

    public function store(){
        Event::create(array_merge($this->validateEvent(),[
            'group_id' => request()->group()->id,
            'location_id' => request()->location()->id
        ]));
    }

    public function update(Event $event){
        $attributes = $this->validateEvent($event);

        $event->update($attributes);

        return back();
    }

    public function delete (Event $event){
        $event->delete();

        return back();
    }

    protected function validateEvent(?Event $event = null): array {
        $event ??= new Event();

        return request()->validate([
            'name' => 'required',
            'desc' => 'required|min=20|max=225',
            'group_id' => ['required', Rule::exists('groups','id')],
            'date' => 'required',
            'location_id' => ['required', Rule::exists('locations','id')],
        ]);
    }
}
