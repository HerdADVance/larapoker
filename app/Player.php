<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
