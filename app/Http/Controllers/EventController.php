<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::with(['user'])
            ->orderBy('published_at', 'DESC')
            ->paginate(24, ['id', 'title', 'thumbnail', 'slug', 'location', 'user_id', 'published_at']);

        return view('event', [
            'title' => 'Event Club Motor Medan',
            'metas' => [
                'description' => 'Event-event yang diselenggarakan oleh Club Motor Medan'
            ],
            'data' => [
                'events' => $events
            ]
        ]);
    }

    public function show(string $slug){
        $event = Event::where('slug', $slug)
            ->with(['user', 'schedules', 'contactPersons', 'attachments'])
            ->first();
        
        if(!$event){
            abort(404);
            return;
        }

        $others = Event::where('id', '!=', $event->id)
            ->whereNotNull('published_at')
            ->orderBy('published_at')
            ->limit(4)
            ->get();

        return view('event.show', [
            'title' => $event->title,
            'metas' => [
                'description' => 'Event Club Motor Medan'
            ],
            'data' => [
                'event' => $event,
                'others' => $others
            ]
        ]);
    }
}
