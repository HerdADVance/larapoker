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

        $user = \Auth::user();
        $players = \Auth::user()->players()->with('game')->get();

        return view('dashboard', compact('players', 'user'));
    }
}
