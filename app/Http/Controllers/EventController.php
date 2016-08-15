<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Event;
class EventController extends Controller
{
    /**
     * Returns a view filled with available events.
     *
     * @param  Request $request
     * @return Response
     */
    public function base(Request $request)
    {
        $data = [
            'page' => 'Events',
            'events' => Event::all()
        ];

        return view('events.base', $data);
    }

    /**
     * Retrieves information about the specified event.
     * @param  Request $request
     * @param  int $id The ID of the event
     * @return Response
     */
    public function event(Request $request, $id = null)
    {
        $data = [];
        $event = Event::where(['id' => $id])->first();

        if (empty($event)) {
            return redirect()->route('home', ['error' => 'invalid_event']);
        }

        $event->description = htmlspecialchars($event->description);
        $data['event'] = $event;
        $data['page'] = 'Event title: ' . htmlspecialchars($event->title);

        return view('events.display', $data);
    }
}
