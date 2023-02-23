@extends('navbar')

@section('title', 'Edit Game')

@section('content')
    <link rel="stylesheet" href="/css/editGameStyle.css" />
    <div class="update-container">
        <h1 class="title">Update Game</h1>
        <form action="{{ url('game/' . $game->id) }}" method="post" class="form-update">
            @csrf
            @method('PATCH')
            <div class="form-content">
                <label class="form-label" for="GameTitle">Game Title</label>
                <input type="text" name="GameTitle" value="{{ $game->GameTitle }}" class="form-input" />
            </div>

            <div class="form-content">
                <label class="form-label" for="Photo">Photo</label>
                <img src="{{ Storage::url('Game Image/' . $game->GameImage) }}"alt="image" class="game-image">
                <input type="file" name="Photo" class="photo">
            </div>

            <div class="form-content">
                <label class="form-label" for="GameDescription">Game Description</label>
                <input type="text" name="GameDescription" value="{{ $game->GameDescription }}" class="form-input" />
            </div>

            <div class="form-content">
                <label class="form-label" for="GamePrice">Game Price</label>
                <input type="number" name="GamePrice" value="{{ $game->GamePrice }}" class="form-input" />
            </div>

            <div class="form-content">
                <label class="form-label" for="GameGenre">Game Genre</label>
                {{-- <input type="" name="GameGenre" value="{{ $game->gamegenre->genre }}" class="form-input"/> --}}
                <select class="form-select" aria-label="Default select example" name="GameGenre">
                    <option selected>{{ $game->gamegenre->genre }}</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-content">
                <label class="form-label" for="PegiRating">PEGI Rating</label>
                <input type="number" name="PegiRating" value="{{ $game->PEGIRating }}" class="form-input" />
            </div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:red">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <input type="submit">
        </form>
    </div>
@endsection
