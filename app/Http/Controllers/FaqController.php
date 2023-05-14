<?php

namespace App\Http\Controllers;

use App\Http\Resources\FaqResource;
use App\Models\Event;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Event $event)
    {
        $faqs = Faq::get();
        return FaqResource::collection($faqs);
    }
    
    public function show($faq)
    {
        $faqs = Faq::findOrFail($faq);
        return new FaqResource($faqs);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'active' => 'sometimes|boolean',
            'question' => 'required|max:225',
            'answer' => 'required|max:225'
        ]);
        $faq = Faq::create($validated);
        return new FaqResource($faq);
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'active' => 'sometimes|boolean',
            'question' => 'required|max:225',
            'answer' => 'required|max:225'
        ]);
        $faq->update($validated);
        return new FaqResource($faq);
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return FaqResource::collection(Faq::all());
    }
}
