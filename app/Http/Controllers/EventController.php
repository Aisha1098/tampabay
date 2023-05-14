<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Faq;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query()
                        ->with(['groups:icon,name']);
        $events = $request->has('hangout') ? $query->where('is_featured', 1)->get() : $query->get();
        return EventResource::collection($events);
    }

    public function show($event)
    {
        $events = Event::with(['faqs','groups'])->findOrFail($event);
        return new EventResource($events);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'is_featured' => 'sometimes|boolean',
            'start_at' => 'required|date|after:tomorrow',
            'name' => 'required|max:30',
            'location' => 'required|max:225',
            'desc' => 'required|max:225'
        ]);
        $event = Event::create($validated);
        return new EventResource($event);
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'is_featured' => 'sometimes|boolean',
            'start_at' => 'required|date|after:tomorrow',
            'name' => 'required|max:30',
            'location' => 'required|max:225',
            'desc' => 'required|max:225'
        ]);
        $event->update($$validated);
        return new EventResource($event);
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return EventResource::collection(Event::all());
    }

}
