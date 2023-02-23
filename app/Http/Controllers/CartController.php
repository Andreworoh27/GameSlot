<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Game;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class CartController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store Checkout Cart to Transaction header and Transaction detail database.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = session()->get('cart');
        $totalitem = 0;
        for ($i = 0; $i < count(Session::get('cart')); $i++) {
            $totalitem += $cart[$i]->quantity;
        }

        DB::table('transaction_headers')->insert([
            'user_id' => Auth::user()->id,
            'TransactionDate' => now(),
            'TotalItem' => $totalitem,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $transactionid =  DB::table('transaction_headers')->latest('created_at')->first();

        for ($i = 0; $i < count(Session::get('cart')); $i++) {
            DB::table('transaction_details')->insert([
                'transaction_id' => $transactionid->transaction_id,
                'game_id' => $cart[$i]->game->id,
                'Quantity' => $cart[$i]->quantity,
                'created_at' => now()
            ]);
        }
        Session::forget('cart');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $cartModel = new Cart();
        $cartModel->game_id = $request->route('cart');
        $cartModel->quantity += 1;
        $cart = session()->get('cart');
        if (!$cart) {
            Session::push('cart', $cartModel);
            return redirect('/');
        }
        foreach ($cart as $game) {
            if ($cartModel->game_id == $game->game_id) {
                $game->quantity += 1;
                return redirect('/');
            }
        }
        Session::push('cart', $cartModel);
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'quantity' => 'numeric | min:0'
        ]);
        $cart = Session::get('cart');
        $cart[$request->route('cart')]->quantity = $request->quantity;
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cart = Session::get('cart');
        unset($cart[$id]);
        Session::forget('cart');
        foreach ($cart as $game) {
            Session::push('cart', $game);
        }
        return redirect()->back();
    }
}
