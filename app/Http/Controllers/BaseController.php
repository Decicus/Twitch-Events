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
    public function home()
    {
        return 'Hello, world';
    }
}
