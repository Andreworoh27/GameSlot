@extends('navbar')

@section('title', 'Transaction History')

@section('content')
    <link rel="stylesheet" href="{{ url('css/transactionHistoryDetailStyle.css') }}">
    <div class="manage-game-container">
        <div class="transaction-info">
            <div class="transaction-id">Transaction ID : {{ $transactions->first()->transaction_id }}</div>
            <div class="transaction-date">Transaction Date : {{ $transactions->first()->transactionHeader->TransactionDate }}
            </div>
            <div>Customer : {{$transactions->first()->transactionHeader->user->name}}</div>
        </div>
        <div class="game-container">
            <div class="game-title">GAME TITLE</div>
            <div class="game-price">GAME PRICE</div>
            <div class="quantity">QUANTITY</div>
            <div class="subtotal">SUBTOTAL</div>
        </div>
        @php
            $grandTotal = 0;
        @endphp
        @foreach ($transactions as $transaction)
            <div class="game-content-container">
                <div class="game-title content-item">
                    {{ $transaction->game->GameTitle }}
                </div>
                <div class="content-item">{{ $transaction->game->GamePrice }}</div>
                <div class="content-item">{{ $transaction->Quantity }}</div>
                @php
                    $subtotal = $transaction->Quantity * $transaction->game->GamePrice;
                    $grandTotal += $subtotal;
                @endphp
                <div class="content-item">{{ $subtotal }}</div>
            </div>
        @endforeach
        <div class="total">Total : ${{ $grandTotal }}</div>
    </div>
@endsection
