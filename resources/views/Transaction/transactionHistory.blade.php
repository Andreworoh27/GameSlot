@extends('navbar')

@section('title', 'Transaction History')

@section('content')
    <link rel="stylesheet" href="{{ url('css/transactionHistoryStyle.css') }}">
    <div class="manage-game-container">
        <div class="game-container">
            <div class="transaction-id">Transaction ID</div>
            <div class="transaction-date">Transaction Date</div>
            <div class="total-item">Total Item</div>
        </div>
        @foreach ($transactions as $transaction)
            <div class="game-content-container">
                <div class="content-item">
                    {{ $transaction->transaction_id }}
                </div>
                <div class="content-item">{{ $transaction->TransactionDate }}</div>
                <div class="content-item">{{ $transaction->TotalItem }}</div>
                <a href="{{ url('transactionhistorydetail/' . $transaction->transaction_id) }}"
                    class="edit-link">Details</a>
            </div>
        @endforeach
    </div>
@endsection
