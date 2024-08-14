<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    /**
     * Creates a new instance of the RegisteredUserController class.
     *
     * @return \Illuminate\Contracts\View\View The view for the registration page.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store the data from the request.
     *
     * This function retrieves all the data from the request and dumps it using the `dd()` function.
     *
     * @return void
     */
    public function store()
    {
        dd(request()->all());
    }
}
