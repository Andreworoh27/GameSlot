<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameGenre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    //
    public function initialPage()
    {
        if (Auth::check()) {
            return redirect('/game');
        } else {
            return view('navbar');
        }
    }
    public function showSignUpPage()
    {
        return view('signup');
    }
    public function showSignInPage()
    {
        return view('signin');
    }
    public function showHomePage()
    {
        return view('home');
    }
    public function showManageGamePage()
    {
        return view('game.manageGame')->with('games', Game::all());
    }
    public function viewEditProfilePage(){
        return view('Profile.editprofile');
    }
}
