<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Displays the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Stores the session data.
     *
     * @return void
     */
    public function store()
    {
        dd(request()->all());
    }
}
