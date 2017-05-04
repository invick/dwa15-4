<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()) {
            return redirect(route('tasks.index'));
        }
        return view('home');
    }
}
