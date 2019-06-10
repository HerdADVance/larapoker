<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Game;
use App\Card;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show all of a user's games
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = \Auth::user()->id;
        $game = Game::all()->last(); // this might be reliable if more than one game created in same second

        var_dump($user_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Store the newly created game
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Show the particular game and only the user's cards

        $user = \Auth::user();
        $game = Game::find($id);
        $players = $game->player()->with('hand')->get();
        $boards = $game->board()->get();
        $viewableHand = false;

        foreach($players as $player){
            if($player->user_id === $user->id){
                $viewableHand = [
                    Card::find($player->hand->card1_id),
                    Card::find($player->hand->card2_id),
                    Card::find($player->hand->card3_id),
                    Card::find($player->hand->card4_id),
                    Card::find($player->hand->card5_id),
                    Card::find($player->hand->card6_id),
                    Card::find($player->hand->card7_id),
                    Card::find($player->hand->card8_id),
                    Card::find($player->hand->card9_id),
                    Card::find($player->hand->card10_id)
                ];
            }
        }

        $viewableBoards = [];
        for($i = 0; $i < $game->round; $i++){
            $viewableBoards[] = [
                Card::find($boards[$i]->card1_id),
                Card::find($boards[$i]->card2_id),
                Card::find($boards[$i]->card3_id),
                Card::find($boards[$i]->card4_id),
                Card::find($boards[$i]->card5_id),
            ];
        }

        return view('games/show', compact('user', 'game', 'players', 'viewableHand', 'viewableBoards'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Take user's selected hands and validate with info in DB
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Save edit after validation
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function tester()
    {
        return "TEST";
    }
}
