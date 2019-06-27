<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Game;
use App\Player;
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

                $viewableHand = [];

                if($player->hand->card1_played === 0) $viewableHand[] = Card::find($player->hand->card1_id);
                if($player->hand->card2_played === 0) $viewableHand[] = Card::find($player->hand->card2_id);
                if($player->hand->card3_played === 0) $viewableHand[] = Card::find($player->hand->card3_id);
                if($player->hand->card4_played === 0) $viewableHand[] = Card::find($player->hand->card4_id);
                if($player->hand->card5_played === 0) $viewableHand[] = Card::find($player->hand->card5_id);
                if($player->hand->card6_played === 0) $viewableHand[] = Card::find($player->hand->card6_id);
                if($player->hand->card7_played === 0) $viewableHand[] = Card::find($player->hand->card7_id);
                if($player->hand->card8_played === 0) $viewableHand[] = Card::find($player->hand->card8_id);
                if($player->hand->card9_played === 0) $viewableHand[] = Card::find($player->hand->card9_id);
                if($player->hand->card10_played === 0) $viewableHand[] = Card::find($player->hand->card10_id);
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
        // Might not be needed. Could allow user to edit some game options?
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
        $user = \Auth::user();
        $game = Game::find($id);
        $players = $game->player()->with('hand')->get();
        $boards = $game->board()->get();
        $viewableHand = false;

        // Get opponent and see if they've played
        $opponentPlayer = Player::where([
            ['game_id', $game->id],
            ['user_id', '!=', $user->id]
        ])->first();
        $opponentHasPlayed = $opponentPlayer->played;

        // Take cards played from request and make sure there's 2 and they're not the same card
        $cardsPlayed = [(int)$request->card_to_play_1, (int)$request->card_to_play_2];
        if($cardsPlayed[0] === $cardsPlayed[1]) {} // throw error
        if(sizeof($cardsPlayed) !== 2) {} // throw error

        // Begin check for player matching user to validate cards and then take appropriate action
        foreach($players as $player){
            if($player->user_id === $user->id){ // player matches user
                
                $userCards = [ // round up the user's cards and if they've been played or not
                    [$player->hand->card1_id, $player->hand->card1_played],
                    [$player->hand->card2_id, $player->hand->card2_played],
                    [$player->hand->card3_id, $player->hand->card3_played],
                    [$player->hand->card4_id, $player->hand->card4_played],
                    [$player->hand->card5_id, $player->hand->card5_played],
                    [$player->hand->card6_id, $player->hand->card6_played],
                    [$player->hand->card7_id, $player->hand->card7_played],
                    [$player->hand->card8_id, $player->hand->card8_played],
                    [$player->hand->card9_id, $player->hand->card9_played],
                    [$player->hand->card10_id, $player->hand->card10_played]
                ];

                $validCardCount = 0;
                $toMarkAsPlayed = [];

                foreach($cardsPlayed as $cardPlayed){ // looping twice for each played card
                    foreach($userCards as $index=>$userCard){ // checking played card against each user card
                        if($userCard[0] === $cardPlayed){ // played card is indeed in user's hand
                            if($userCard[1] === 0){ // card is also unplayed meaning it's eligible to be played

                                $validCardCount ++;
                                $toMarkAsPlayed[] = $index + 1;

                            } else // throw error for card already having been played
                            break;
                        }
                    }

                    // throw error for card not found
                }

                if($validCardCount === 2){

                    foreach($toMarkAsPlayed as $card){ // marking played cards as played in user's hand
                        $player->hand->{'card' . $card . '_played'} = $game->round;
                    }

                    $player->played = 1;
                    $player->hand->save();
                    $player->save();

                    //($opponentHasPlayed === 1){
                        //dd('Opponent played');
                        $board = [
                            Card::find($boards[$game->round - 1]->card1_id),
                            Card::find($boards[$game->round - 1]->card2_id),
                            Card::find($boards[$game->round - 1]->card3_id),
                            Card::find($boards[$game->round - 1]->card4_id),
                            Card::find($boards[$game->round - 1]->card5_id),
                        ];

                        $playerHand = [
                            Card::find($cardsPlayed[0]),
                            Card::find($cardsPlayed[1]),
                        ];

                        $sevenCards = array_merge($board, $playerHand);

                        foreach($sevenCards as $index=>$c){
                            $sevenCards[$index] = $c->face . $c->suit;
                        }

                        // animations for opponent's cards turning
                        // compare cards
                        // update score
                        // update round
                        // reset played to false
                        // animations for new board
                        // message to play next round
                    //} else{
                        //dd('Opponent has not played');
                        // update view to move cards as if they've been played
                        // update view to say waiting for opponent
                    //}

                    // update round status if need be
                    // aminations of opponent's card if need be
                    // update view

                } else{
                    // throw error for not having 2 valid cards
                }


                // Start working on new view
                if($player->hand->card1_played === 0) $viewableHand[] = Card::find($player->hand->card1_id);
                if($player->hand->card2_played === 0) $viewableHand[] = Card::find($player->hand->card2_id);
                if($player->hand->card3_played === 0) $viewableHand[] = Card::find($player->hand->card3_id);
                if($player->hand->card4_played === 0) $viewableHand[] = Card::find($player->hand->card4_id);
                if($player->hand->card5_played === 0) $viewableHand[] = Card::find($player->hand->card5_id);
                if($player->hand->card6_played === 0) $viewableHand[] = Card::find($player->hand->card6_id);
                if($player->hand->card7_played === 0) $viewableHand[] = Card::find($player->hand->card7_id);
                if($player->hand->card8_played === 0) $viewableHand[] = Card::find($player->hand->card8_id);
                if($player->hand->card9_played === 0) $viewableHand[] = Card::find($player->hand->card9_id);
                if($player->hand->card10_played === 0) $viewableHand[] = Card::find($player->hand->card10_id);

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

            } // end if player matches user

        }

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
