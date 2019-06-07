<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Player;
use App\User;

class Player extends Model
{
	public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function game()
    {
        return $this->belongsTo('App\Game', 'game_id');
    }

    public function hand()
    {
        return $this->hasOne('App\Hand');
    }


    public function getOpponentNameAttribute()
    {
        $opponentPlayer = Player::where([
            ['game_id', $this->game->id],
            ['user_id', '!=', $this->user_id]
        ])->first();

        $opponentUser = User::find($opponentPlayer->id);

        $name = $opponentUser->name;

        return $name;
    }

    public function getOpponentScoreAttribute()
    {
        $opponentPlayer = Player::where([
            ['game_id', $this->game->id],
            ['user_id', '!=', $this->user_id]
        ])->first();

        $score = $opponentPlayer->score;

        return $score;
    }
}
