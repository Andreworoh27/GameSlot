@extends('navbar')

@section('title', 'Cart')

@section('content')
    <link rel="stylesheet" href="/css/CartStyle.css">
    <div class="manage-game-container">
        <form action="/cart" method="POST">
            @csrf
            <input class="checkout-link" type="submit" value="Checkout"></input>
        </form>
        <div class="game-container">
            <div class="game-title">GAME TITLE</div>
            <div class="pegi-rating">Game Price</div>
            <div class="game-genre">Quantity</div>
        </div>
        {{-- {{Session::forget('cart')}} --}}
        @if (Session::get('cart'))
            @php
                $cart = Session::get('cart');
            @endphp
            @for ($i = 0; $i < count(Session::get('cart')); $i++)
                <div class="game-content-container">
                    <div class="game-title content-item"><img
                            src="{{ Storage::url('Game Image/' . $cart[$i]->game->GameImage) }}" alt="image"
                            class="game-image">
                        {{ $cart[$i]->game->GameTitle }}
                    </div>
                    <div class="game-price content-item">{{ $cart[$i]->game->GamePrice }}$</div>
                    <form action="{{ url('cart/' . $i) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="number" class="game-quantity content-item" name="quantity"
                            value="{{ $cart[$i]->quantity }}">
                        <input type="submit" value="update" class="edit-link"
                            style="border: none;background-color:transparent">
                    </form>
                    <form action="{{ url('cart/' . $i) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="delete" class="delete-link"
                            style="border: none;background-color:transparent">
                    </form>
                </div>
            @endfor
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color:red;margin-left:15%">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            @php
                unset($errors);
            @endphp
        @endif
    </div>
@endsection
