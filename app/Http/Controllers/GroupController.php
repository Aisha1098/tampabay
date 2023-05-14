<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupResource;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $query = Group::query();
        $groups = $request->is_slack ? $query->where('is_slack', 1)->get() : $query->get();
        return GroupResource::collection($groups);
    }

    public function show($id)
    {
        $group = Group::findOrFail($id);
        return new GroupResource($group);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'is_slack' => 'sometimes|boolean',
            'is_credit' => 'sometimes|boolean',
            'name' => 'required|max:30',
            'desc' => 'required|max:225',
            'icon' => 'required',
        ]);
        $group = Group::create($validated);
        return new GroupResource($group);
    }

    public function update(Request $request, Group $group)
    {
        $validated = $request->validate([
            'is_slack' => 'sometimes|boolean',
            'is_credit' => 'sometimes|boolean',
            'name' => 'required|max:30',
            'desc' => 'required|max:225',
            'icon' => 'required',
        ]);
        $group->update($validated);
        return new GroupResource($group);
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return GroupResource::collection(Group::all());
    }
}
