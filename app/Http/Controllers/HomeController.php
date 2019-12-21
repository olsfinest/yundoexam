<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // After login this loads to admin area

    public function index()
    {
        // User can't login if he is not an admin type

        if(Auth::user()->is_admin != 1) {

       
            return redirect('');

        }

        // Loads Dashboard

        return view('home');
    }
}
