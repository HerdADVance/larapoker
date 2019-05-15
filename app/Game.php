<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function board()
    {
        return $this->hasMany('App\Board'); // Only 5
    }

    public function player()
    {
    	return $this->hasMany('App\Player'); // Only 2
    }
}
