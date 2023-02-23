@extends('navbar')

@section('title', 'Game Detail')

@section('content')
    <link rel="stylesheet" href="{{ url('css/gameDetailStyle.css') }}">
    <div class="outside-container">
        <div class="game-detail-container"
            style="background-image: url('{{ Storage::url('Game Image/' . $game->GameImage) }}');">
            <div class="title">{{ $game->GameTitle }}</div>
            <div class="content-container">
                <div class="container-kiri">
                    <div class="game-genre">{{ $game->gamegenre->genre }}</div>
                    <div>{{ $game->GameDescription }}</div>
                </div>
                <div class="container-kanan">
                    <div class="container-kanan-atas">
                        @if ($game->PEGIRating >= 18)
                            <div class="pegi-box red">
                                <div style="margin-top:3px">{{ $game->PEGIRating }}</div>
                                <div class="pegi-link">www.pegi.info</div>
                            </div>
                        @elseif ($game->PEGIRating >= 12 && $game->PEGIRating <= 16)
                            <div class="pegi-box orange">
                                <div style="margin-top:3px">{{ $game->PEGIRating }}</div>
                                <div class="pegi-link">www.pegi.info</div>
                            </div>
                        @else
                            <div class="pegi-box green">
                                <div style="margin-top:3px">{{ $game->PEGIRating }}</div>
                                <div class="pegi-link">www.pegi.info</div>
                            </div>
                        @endif
                        <div class="game-price">${{ $game->GamePrice }}</div>
                    </div>
                    <div class="container-kanan-bawah">
                        <a href="{{ url('cart/' . $game->id) }}" class="add-button"> Add To Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
