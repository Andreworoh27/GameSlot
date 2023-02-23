@extends('navbar')

@section('title', 'Add Game')

@section('content')
    <link rel="stylesheet" href="/css/editGameStyle.css" />
    <script src="/js/addGameScript.js"></script>
    <div class="update-container">
        <h1 class="title">Add Game</h1>
        <form action="{{ url('game/') }}" method="post" class="form-update" enctype="multipart/form-data">
            @csrf
            <div class="form-content">
                <label class="form-label" for="GameTitle">Game Title</label>
                <input type="text" name="GameTitle" class="form-input" />
            </div>

            <div class="form-content">
                <label class="form-label" for="photo">Photo</label>
                <input type="file" name="photo" class="photo" />
            </div>

            <div class="form-content">
                <label class="form-label" for="GameDescription">Game Description</label>
                <textarea type="text" name="GameDescription" class="form-input"cols="40"></textarea>
            </div>

            <div class="form-content">
                <label class="form-label" for="GamePrice">Game Price</label>
                <input type="number" name="GamePrice" class="form-input" />
            </div>

            <div class="form-content">
                <label class="form-label" for="GameGenre">Game Genre</label>
                <select class="form-select" aria-label="Default select example" onchange="newGenre()" name="GameGenre"
                    id="genre">
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                    @endforeach
                    <option value="-1">New Genre</option>
                </select>
            </div>

            <div class="form-content displaynone" id="newgenre">
                <label class="form-label" for="NewGameGenre">New Game Genre</label>
                <input type="text" name="NewGameGenre" class="form-input" />
            </div>

            <div class="form-content">
                <label class="form-label" for="PegiRating">PEGI Rating</label>
                <input type="number" name="PegiRating" class="form-input" />
            </div>

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:red">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <input type="submit" value="Add">
        </form>
    </div>
@endsection
