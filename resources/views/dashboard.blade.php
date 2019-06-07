@extends('layouts.app')

@section('css')
<link href="/css/dashboard.css" rel="stylesheet">
@endsection



@section('content')

<div class="container dashboard">
    <h1>{{$user->name}}</h1>

    <h1>Dashboard</h1>

    <button class="btn start"><a href="/games/create">Start a New Game</a></button>

    <h2>Current Games</h2>

    <table class="current-games">
        <tr>
            <th>Opponent</th>
            <th>Score</th>
            <th>Round</th>
            <th></th>
        </tr>

        @foreach($players as $player)
            <tr>
                <td>{{$player->opponentName}}</td>
                <td>{{$player->score}}-{{$player->opponentScore}}</td>
                <td>{{$player->game->round}}</td>
                <td><a href="/games/{{$player->game->id}}">Play</a></td>
            </tr>
        @endforeach
    </table>
</div>

@endsection



@section('js')
<script src="/js/dashboard.js"></script>
@endsection
