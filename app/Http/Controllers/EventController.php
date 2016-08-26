<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\JoinOrLeaveEventRequest;
use Auth;

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

        $errors = [
            'invalid_event' => [
                'type' => 'warning',
                'text' => 'An invalid event was specified.'
            ],
            'already_joined' => [
                'type' => 'warning',
                'text' => 'You have already joined this event.'
            ],
            'not_joined' => [
                'type' => 'warning',
                'text' => 'You cannot leave an event you have not joined.'
            ]
        ];

        if ($request->has('error')) {
            $error = $request->input('error');
            if (isset($errors[$error])) {
                $data['message'] = $errors[$error];
            }
        }

        return view('events.base', $data);
    }

    /**
     * Retrieves information about the specified event.
     * @param  Request $request
     * @param  int $id The ID of the event
     * @param  array $message An array with message data for the view
     * @return Response
     */
    public function event(Request $request, $id = null, $message = [])
    {
        $data = [
            'message' => $message
        ];
        $event = Event::where(['id' => $id])->first();

        if (empty($event)) {
            return redirect()->route('events.base', ['error' => 'invalid_event']);
        }

        $data['event'] = $event;
        $data['users'] = $event->users()->get();
        $data['page'] = 'Event title: ' . htmlspecialchars($event->title);

        return view('events.display', $data);
    }

    /**
     * Signs a user up for an event.
     *
     * @param  JoinOrLeaveEventRequest $request
     * @return Response
     */
    public function join(JoinOrLeaveEventRequest $request)
    {
        $id = $request->input('id');
        $event = Event::where(['id' => $id])->first();
        $user = Auth::user();

        if (!empty($event->users()->where(['id' => $user->id])->first())) {
            return redirect()->route('events.base', ['error' => 'already_joined']);
        }

        $event->users()->attach($user);
        $message = ['type' => 'success', 'text' => 'You have successfully joined this event.'];
        return $this->event($request, $id, $message);
    }

    /**
     * Removes a user from the specified event's signup list.
     *
     * @param  JoinOrLeaveEventRequest $request
     * @return Response
     */
    public function leave(JoinOrLeaveEventRequest $request)
    {
        $id = $request->input('id');
        $event = Event::where(['id' => $id])->first();
        $user = Auth::user();

        if (empty($event->users()->where(['id' => $user->id])->first())) {
            return redirect()->route('events.base', ['error' => 'not_joined']);
        }

        $event->users()->detach($user);
        $message = ['type' => 'success', 'text' => 'You have successfully left this event.'];
        return $this->event($request, $id, $message);
    }

    /**
     * Redirects back to /events for GET routes that aren't used.
     *
     * @return Response
     */
    public function redirectToEvents()
    {
        return redirect()->route('events.base', ['error' => 'invalid_event']);
    }
}
