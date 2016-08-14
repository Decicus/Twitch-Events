<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\AddEventRequest;
use App\Http\Requests\EditEventRequest;

use App\Event;
class AdminEventController extends Controller
{
    /**
     * The view for adding events
     *
     * @param Request $request
     * @return Response
     */
    public function add(Request $request)
    {
        $data = [
            'page' => 'Add Event'
        ];

        return view('admin.events.add', $data);
    }

    /**
     * Handles event adding
     *
     * @param AddEventRequest $request
     * @return Response
     */
    public function addPost(AddEventRequest $request)
    {
        $data = [
            'page' => 'Add Event'
        ];

        $event = new Event();
        $event->title = trim($request->input('title'));
        $event->description = trim($request->input('description'));
        $event->save();
        $data['message'] = $this->message('This event has been successfully saved.', 'success');

        return view('admin.events.add', $data);
    }

    /**
     * The view for editing events
     *
     * @param Request $request
     * @param int $id ID of the event
     * @return Response
     */
    public function edit(Request $request, $id = null)
    {
        $data = [
            'page' => 'Edit Event'
        ];

        if (!empty($id)) {
            $event = Event::where(['id' => $id])->first();
            if (empty($event)) {
                $data['message'] = $this->message('An event with this ID does not exist.');
            }

            $data['event'] = $event;
        }

        $data['events'] = Event::all();

        return view('admin.events.edit', $data);
    }

    /**
     * Handles event editing
     *
     * @param  EditEventRequest $request
     * @return Response
     */
    public function editPost(EditEventRequest $request)
    {
        $data = [
            'page' => 'Edit Event'
        ];

        $event = Event::where(['id' => $request->input('id')])->first();
        $event->title = trim($request->input('title'));
        $event->description = trim($request->input('description'));
        $event->save();
        $data['message'] = $this->message('This event has been successfully updated.', 'success');

        $data['events'] = Event::all();

        return view('admin.events.edit', $data);
    }

    /**
     * The view for deleting events
     *
     * @param Request $request
     * @return Response
     */
    public function delete(Request $request)
    {
        $data = [
            'page' => 'Delete Event'
        ];

        return view('admin.events.delete', $data);
    }

    /**
     * Returns an array to be used by the error view.
     *
     * @param string $text The alert message
     * @param string $type The alert bootstrap styling
     */
    private function message($text, $type = 'warning')
    {
        return ['type' => $type, 'text' => $text];
    }
}
