<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hand extends Model
{
    public function player()
    {
        return $this->belongsTo('App\Player', 'player_id');
    }
}
