@extends('navbar')

@section('title', 'Manage Game')

@section('content')
    @if (Auth::user()->role == 'member')
    <div>
        <div class="manage-game-container">
            <a href="/game/create" class="add-game-link">Add Game</a>
            <div class="game-container">
                <div class="game-title">GAME TITLE</div>
                <div class="pegi-rating">PEGI RATING</div>
                <div class="game-genre">GAME GENRE</div>
                <div class="game-price">GAME PRICE</div>
            </div>
    </div>
    @else
        <link rel="stylesheet" href="/css/manageGameStyle.css">
        <div class="manage-game-container">
            <a href="/game/create" class="add-game-link">Add Game</a>
            <div class="game-container">
                <div class="game-title">GAME TITLE</div>
                <div class="pegi-rating">PEGI RATING</div>
                <div class="game-genre">GAME GENRE</div>
                <div class="game-price">GAME PRICE</div>
            </div>
            @foreach ($games as $game)
                <div class="game-content-container">
                    <div class="game-title content-item"><img src="{{ Storage::url('Game Image/' . $game->GameImage) }}"
                            alt="image" class="game-image">
                        {{ $game->GameTitle }}
                    </div>
                    <div class="pegi-rating content-item">{{ $game->PEGIRating }}</div>
                    <div class="game-genre content-item">{{ $game->gamegenre->genre }}</div>
                    <div class="game-price content-item">{{ $game->GamePrice }}</div>
                    <a href="{{ url('game/' . $game->id . '/edit') }}" class="edit-link">edit</a>
                    <form action="{{ url('game/' . $game->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="delete" class="delete-link"
                            style="border: none;background-color:transparent">
                    </form>
                </div>
            @endforeach
        </div>
    @endif
@endsection
