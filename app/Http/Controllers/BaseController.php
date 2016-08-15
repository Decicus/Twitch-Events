<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BaseController extends Controller
{
    /**
     * The homepage view
     *
     * @return Response
     */
    public function home(Request $request)
    {
        $data = [
            'page' => 'Home'
        ];

        $errors = [
            'login_required' => [
                'type' => 'warning',
                'text' => 'You have to be <a href="' . route('auth.twitch') . '" class="alert-link">logged in</a> to access this page.'
            ],
            'no_permission' => [
                'type' => 'danger',
                'text' => 'You do not have permission to view this page.'
            ]
        ];

        if ($request->has('error')) {
            $error = $request->input('error');
            if (isset($errors[$error])) {
                $data['message'] = $errors[$error];
            }
        }

        return view('base.home', $data);
    }
}
