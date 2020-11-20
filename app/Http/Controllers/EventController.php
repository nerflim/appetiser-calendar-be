<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Models\Event;

class EventController extends Controller
{
    public function __construct()
    {
      // do something
    }

    /**
     * Get all events
     */
    public function index(Request $request)
    {
        $events = Event::all();
        return $this->response($events);
    }

    /**
     * Store events
     */
    
    public function post(Request $request)
    {
        $this->validate($request, [
            'event' => 'required|string',
            'date' => 'required|array',
            'days' => 'required|array'
        ]);

        $event = new Event;
        $event->name = $request->event;
        $event->date_from = $request->date[0];
        $event->date_to = $request->date[1];
        $event->days = collect($request->days)->implode(',');
        $event->save();

        return $this->response(['success' => true, 'message' => 'Event saved successfully!']);
    }
}
