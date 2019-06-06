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

    @foreach($players as $player)
        <p>{{$player->game}}</p>
    @endforeach

    <table>
        <tr>
            <th>Opponent</th>
            <th>Score</th>
            <th>Status</th>
        </tr>

        <tr>
            <td>Walrus</td>
            <td>2-1</td>
            <td>Play</td>
        </tr>
        <tr>
            <td>Otter</td>
            <td>2-0</td>
            <td>View</td>
        </tr>
        <tr>
            <td>Gopher</td>
            <td>2-2</td>
            <td>Play</td>
        </tr>
        <tr>
            <td>Penguin</td>
            <td>1-2</td>
            <td>Play</td>
        </tr>
    </table>
</div>

@endsection



@section('js')
<script src="/js/dashboard.js"></script>
@endsection
