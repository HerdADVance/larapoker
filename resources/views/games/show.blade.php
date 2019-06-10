@extends('layouts.app')

@section('css')
<link href="/css/games/show.css" rel="stylesheet">
@endsection



@section('content')

<div class="container game">

    <h1>Game # {{$game->id}}</h1>

    @foreach($players as $player)

	    <div class="player{{$player->user_id === $user->id? ' user-is-player' : ''}}" data-uid="{{$player->user_id}}">
	    	
	    	<div class="player-info">
	    		<div class="player-avatar"></div>
	    		<div class="player-name">{{$player->user->name}}</div>
	    		<div class="player-score">{{$player->score}}</div>
	    	</div>

	    	<div class="player-cards">

	    		@if($player->user_id === $user->id)

			    	@foreach($viewableHand as $card)
			    		<img 
			    			class="card" 
			    			src="/img/cards/{{$card->face}}{{$card->suit}}.png"
			    			data-face="{{$card->face}}"
			    			data-rank="{{$card->rank}}" 
			    			data-suit="{{$card->suit}}"
			    		>
			    	@endforeach

			    @else
			    	
			    	@for($i=0; $i < 10; $i++)
			    		<img 
			    			class="card" 
			    			src="/img/cards/back.png"
			    		>
			    	@endfor

			    @endif
	    	</div>
	    </div>

	@endforeach

	<div class="board">
		<div class="board-cards">
			@foreach($viewableBoards[0] as $card)
	    		<img 
	    			class="card" 
	    			src="/img/cards/{{$card->face}}{{$card->suit}}.png"
	    			data-face="{{$card->face}}"
	    			data-rank="{{$card->rank}}" 
	    			data-suit="{{$card->suit}}"
	    		>
	    	@endforeach
		</div>
	</div>

	@if($player->user_id === $user->id)
	    <div style="clear:both;">
	    	<button class="btn neutral" id="sort-rank">Sort By Rank</button>
	    	<button class="btn neutral" id="sort-suit">Sort By Suit</button>
		</div>
	@endif
    
</div>

@endsection



@section('js')
<script src="/js/games/show.js"></script>
@endsection
