<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function ShowTransactionHeader()
    {
        $transactions = TransactionHeader::all()->where('user_id', '=', Auth::user()->id);
        return view('Transaction.transactionHistory')->with('transactions', $transactions);
    }

    public function ShowTransactionDetail(Request $request)
    {
        $transactionid = $request->route('id');
        $transactions = TransactionDetail::all()->where('transaction_id', '=', $transactionid);
        // dd($transactions[3]->game);
        return view('Transaction.transactionHistoryDetail')->with('transactions', $transactions);
    }
}
