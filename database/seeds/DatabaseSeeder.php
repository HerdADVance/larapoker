<?php

use Illuminate\Database\Seeder;

use App\Card;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('users')->insert([
    		['username' => 'ballsoherd', 'name' => 'Alex', 'email' => 'avance@bulldogcreative.com', 'password' =>'levispenis'],
    		['username' => 'levi', 'name' => 'Levi', 'email' => 'ldurfee@bulldogcreative.com', 'password' =>'levispenis']
    	]);

        DB::table('cards')->insert([
        	['rank' => 2, 'face' => '2', 'suit' => 'C'],
			['rank' => 3, 'face' => '3', 'suit' => 'C'],
			['rank' => 4, 'face' => '4', 'suit' => 'C'],
			['rank' => 5, 'face' => '5', 'suit' => 'C'],
			['rank' => 6, 'face' => '6', 'suit' => 'C'],
			['rank' => 7, 'face' => '7', 'suit' => 'C'],
			['rank' => 8, 'face' => '8', 'suit' => 'C'],
			['rank' => 9, 'face' => '9', 'suit' => 'C'],
			['rank' => 10, 'face' => 'T', 'suit' => 'C'],
			['rank' => 11, 'face' => 'J', 'suit' => 'C'],
			['rank' => 12, 'face' => 'Q', 'suit' => 'C'],
			['rank' => 13, 'face' => 'K', 'suit' => 'C'],
			['rank' => 14, 'face' => 'A', 'suit' => 'C'],
			['rank' => 2, 'face' => '2', 'suit' => 'D'],
			['rank' => 3, 'face' => '3', 'suit' => 'D'],
			['rank' => 4, 'face' => '4', 'suit' => 'D'],
			['rank' => 5, 'face' => '5', 'suit' => 'D'],
			['rank' => 6, 'face' => '6', 'suit' => 'D'],
			['rank' => 7, 'face' => '7', 'suit' => 'D'],
			['rank' => 8, 'face' => '8', 'suit' => 'D'],
			['rank' => 9, 'face' => '9', 'suit' => 'D'],
			['rank' => 10, 'face' => 'T', 'suit' => 'D'],
			['rank' => 11, 'face' => 'J', 'suit' => 'D'],
			['rank' => 12, 'face' => 'Q', 'suit' => 'D'],
			['rank' => 13, 'face' => 'K', 'suit' => 'D'],
			['rank' => 14, 'face' => 'A', 'suit' => 'D'],
			['rank' => 2, 'face' => '2', 'suit' => 'H'],
			['rank' => 3, 'face' => '3', 'suit' => 'H'],
			['rank' => 4, 'face' => '4', 'suit' => 'H'],
			['rank' => 5, 'face' => '5', 'suit' => 'H'],
			['rank' => 6, 'face' => '6', 'suit' => 'H'],
			['rank' => 7, 'face' => '7', 'suit' => 'H'],
			['rank' => 8, 'face' => '8', 'suit' => 'H'],
			['rank' => 9, 'face' => '9', 'suit' => 'H'],
			['rank' => 10, 'face' => 'T', 'suit' => 'H'],
			['rank' => 11, 'face' => 'J', 'suit' => 'H'],
			['rank' => 12, 'face' => 'Q', 'suit' => 'H'],
			['rank' => 13, 'face' => 'K', 'suit' => 'H'],
			['rank' => 14, 'face' => 'A', 'suit' => 'H'],
			['rank' => 2, 'face' => '2', 'suit' => 'S'],
			['rank' => 3, 'face' => '3', 'suit' => 'S'],
			['rank' => 4, 'face' => '4', 'suit' => 'S'],
			['rank' => 5, 'face' => '5', 'suit' => 'S'],
			['rank' => 6, 'face' => '6', 'suit' => 'S'],
			['rank' => 7, 'face' => '7', 'suit' => 'S'],
			['rank' => 8, 'face' => '8', 'suit' => 'S'],
			['rank' => 9, 'face' => '9', 'suit' => 'S'],
			['rank' => 10, 'face' => 'T', 'suit' => 'S'],
			['rank' => 11, 'face' => 'J', 'suit' => 'S'],
			['rank' => 12, 'face' => 'Q', 'suit' => 'S'],
			['rank' => 13, 'face' => 'K', 'suit' => 'S'],
			['rank' => 14, 'face' => 'A', 'suit' => 'S']
        ]);

        $cards = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52];
        shuffle($cards);

        DB::table('games')->insert([
        	['status' => 0, 'round' => 1]
        ]);

        DB::table('players')->insert([
        	['user_id' => 1, 'game_id' => 1, 'score' => 0, 'result' => 0],
        	['user_id' => 2, 'game_id' => 1, 'score' => 0, 'result' => 0]
        ]);

        DB::table('hands')->insert([
        	[
        		'player_id' => 1, 
        		'card1_id' => $cards[0], 
        		'card2_id' => $cards[1], 
        		'card3_id' => $cards[2], 
        		'card4_id' => $cards[3], 
        		'card5_id' => $cards[4], 
        		'card6_id' => $cards[5], 
        		'card7_id' => $cards[6], 
        		'card8_id' => $cards[7], 
        		'card9_id' => $cards[8], 
        		'card10_id' => $cards[9] 
        	],
        	[
        		'player_id' => 2, 
        		'card1_id' => $cards[10], 
        		'card2_id' => $cards[11], 
        		'card3_id' => $cards[12], 
        		'card4_id' => $cards[13], 
        		'card5_id' => $cards[14], 
        		'card6_id' => $cards[15], 
        		'card7_id' => $cards[16], 
        		'card8_id' => $cards[17], 
        		'card9_id' => $cards[18], 
        		'card10_id' => $cards[19] 
        	]
        ]);

        DB::table('boards')->insert([
        	[
        		'game_id' => 1, 
        		'round' => 1, 
        		'card1_id' => $cards[20], 
        		'card2_id' => $cards[21], 
        		'card3_id' => $cards[22], 
        		'card4_id' => $cards[23], 
        		'card5_id' => $cards[24]  
        	],
        	[
        		'game_id' => 1, 
        		'round' => 2, 
        		'card1_id' => $cards[25], 
        		'card2_id' => $cards[26], 
        		'card3_id' => $cards[27], 
        		'card4_id' => $cards[28], 
        		'card5_id' => $cards[29]  
        	],
        	[
        		'game_id' => 1, 
        		'round' => 3, 
        		'card1_id' => $cards[30], 
        		'card2_id' => $cards[31], 
        		'card3_id' => $cards[32], 
        		'card4_id' => $cards[33], 
        		'card5_id' => $cards[34]  
        	],
        	[
        		'game_id' => 1, 
        		'round' => 4, 
        		'card1_id' => $cards[35], 
        		'card2_id' => $cards[36], 
        		'card3_id' => $cards[37], 
        		'card4_id' => $cards[38], 
        		'card5_id' => $cards[39]  
        	],
        	[
        		'game_id' => 1, 
        		'round' => 5, 
        		'card1_id' => $cards[40], 
        		'card2_id' => $cards[41], 
        		'card3_id' => $cards[42], 
        		'card4_id' => $cards[43], 
        		'card5_id' => $cards[44]  
        	]
        ]);
    }
}
