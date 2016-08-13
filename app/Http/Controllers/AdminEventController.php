<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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

        if ($request->isMethod('post')) {
            $check = $this->checkRequestData($request);

            if (is_array($check) && isset($check['type'], $check['text'])) {
                $data['message'] = $check;
                $data['title'] = $request->input('title', null);
                $data['description'] = $request->input('description', null);
            }

            if ($check === true) {
                $event = new Event();
                $event->title = trim($request->input('title'));
                $event->description = trim($request->input('description'));
                $event->save();
                $data['message'] = $this->message('This event has been successfully saved.', 'success');
            }
        }

        return view('admin.events.add', $data);
    }

    /**
     * The view for editing events
     *
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request)
    {
        $data = [
            'page' => 'Edit Event'
        ];

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

    /**
     * Checks the request data and verifies if it can be added as an event.
     *
     * @param  Request $request The POST request from the forms
     * @return array|bool Array for the error view, or bool if all checks have passed.
     */
    private function checkRequestData(Request $request)
    {
        if (!$request->has('title')) {
            return $this->message('An event title is required.');
        }

        if (!$request->has('description')) {
            return $this->message('An event description is required.');
        }

        $title = trim($request->input('title'));
        $description = trim($request->input('description'));

        if (strlen($title) > 100) {
            return $this->message('Title cannot be more than 100 characters.');
        }

        if (strlen($description) > 10000) {
            return $this->message('Description cannot be more than 10000 characters.');
        }

        return true;
    }
}
