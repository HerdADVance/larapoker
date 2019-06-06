<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Player;
use App\Hand;
use App\Game;

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
    public function index()
    {

        $players = \Auth::user()->players()->with('hand', 'game')->get();
        $user = \Auth::user();

        return view('dashboard', compact('players', 'user'));
    }
}
