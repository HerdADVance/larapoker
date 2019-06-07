@extends('layouts.app')

@section('css')
<link href="/css/games/show.css" rel="stylesheet">
@endsection



@section('content')

<div class="container game">

    <h1>Game # {{$game->id}}</h1>

    <div class="player" data-pid="">
    	<div class="player-cards">
	    	@foreach($viewableHand as $card)
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

    <div style="clear:both;">
    	<button class="btn neutral" id="sort-rank">Sort By Rank</button>
    	<button class="btn neutral" id="sort-suit">Sort By Suit</button>
	</div>
    
</div>

@endsection



@section('js')
<script src="/js/games/show.js"></script>
@endsection
