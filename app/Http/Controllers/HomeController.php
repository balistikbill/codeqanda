<?php

namespace App\Http\Controllers;

use \Auth;
use App\User;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('home')->with('user', $user);
    }


    public function update(User $user, Request $request)
    {
        $user->update($request->all());
        
        return back();
    }
}
