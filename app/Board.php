<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public function game()
    {
        return $this->belongsTo('App\Game', 'game_id');
    }
}
