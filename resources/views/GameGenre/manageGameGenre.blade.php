@extends('navbar')

@section('title', 'Manage Game Genre')

@section('content')
    <link rel="stylesheet" href="/css/manageGameGenreStyle.css">
    <div class="manage-game-container">
        {{-- <a href="#" class="add-game-link">Add Genre</a> --}}
        <div class="game-container">
            <div class="game-title">GAME GENRE</div>
        </div>
        @foreach ($genres as $genre)
            <div class="game-content-container">
                <div class="game-title content-item">
                    {{ $genre->genre }}
                </div>
                {{-- <div class="pegi-rating content-item">{{ $game->PEGIRating }}</div>
                <div class="game-genre content-item">{{ $game->gamegenre->genre }}</div>
                <div class="game-price content-item">{{ $game->GamePrice }}</div> --}}
                <a href="{{ url('gamegenre/' . $genre->id . '/edit') }}" class="edit-link">edit</a>
                <form action="{{ url('gamegenre/' . $genre->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="delete" class="delete-link"
                        style="border: none;background-color:transparent">
                </form>
            </div>
        @endforeach
    </div>
@endsection
