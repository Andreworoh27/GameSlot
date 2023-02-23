@extends('navbar')

@section('title', 'home')

@section('content')
    <link rel="stylesheet" href="/css/homeStyle.css">
    <div class="card-container">
        {{-- @if (Cookies::get('CartNotification') != null)
            <div>{{ Cookies::get('CartNotification') }}</div>
        @endif --}}
        @foreach ($games as $game)
            <a class="card" href="{{ url('game/' . $game->id) }}" style="text-decoration: none; color:black;">
                <img src="{{ Storage::url('Game Image/' . $game->GameImage) }}" alt="game image" class="game-image">
                <div class="card-content-container">
                    <p>{{ $game->GameTitle }}</p>
                    <p class="game-genre">{{ $game->gamegenre->genre }}</p>
                    {{-- @php
                            Game::find($game->gamegenre_id)->gamegenre;
                        @endphp --}}
                    </php>
                    <hr class="garis">
                    <div>
                        @if ($game->GamePrice == 0)
                            free
                        @else
                            ${{ $game->GamePrice }}
                        @endif
                    </div>
                </div>
                {{-- <div>
                    <div>{{ GameGenre::find($game->GameGenreID)->genre }}</div>
                    <div>{{ $game->GameGenreID }}</div>
                </div>
                <div>
                    <div>${{$game->GamePrice}}</div>
                </div> --}}
            </a>
            {{-- <img src="{{$game->GameImage}}" alt="image">
        <div>{{$game->id}}</div>
        <div>{{$game->GameTitle}}</div>
        <div>{{$game->GameDescription}}</div>
        <img>{{$game->GameImage}}</img> --}}
        @endforeach
    </div>
@endsection
