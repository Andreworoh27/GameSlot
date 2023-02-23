<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameGenre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;

class GameController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminAuth')->except('index', 'show', 'searchGame');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // cara ubah genre games yang di dapat tanpa eloquent
        // $games = Game::all();
        // $i = 0;
        // foreach ($games as $game) {
        //     $genre = Game::find($game->gamegenre_id)->gamegenre->genre;
        //     // echo $genre;
        //     $games[$i]->gamegenre_id = $genre;
        //     // echo $i . $games[$i]->gamegenre_id = $genre . " ";
        //     $i++;
        // }
        // dd($games);

        //pagination blom beres
        // $games = Game::all()->paginate(10);
        return view('home')->with('games', Game::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = GameGenre::all();
        return view('Game.addGame')->with('genres', $genres);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'GameTitle' => 'required',
            'GameDescription' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg',
            'GamePrice' => 'numeric|min:0',
            'PegiRating' => 'required'
        ]);

        $GameTitle = $request->GameTitle;
        $Photo = $request->file('photo');
        $GameDescription = $request->GameDescription;
        $GamePrice = $request->GamePrice;
        $PegiRating = $request->PegiRating;

        if ($request->GameGenre >= 0) {
            $GameGenre = $request->GameGenre;
        } else {
            $GameGenre = $request->NewGameGenre;
            $genre = GameGenre::where('genre', $GameGenre)->first();
            if ($genre == null) {
                DB::table('game_genres')->insert([
                    'genre' => $GameGenre,
                    'created_at' => now(),
                ]);
                $GameGenre = GameGenre::where('genre', $GameGenre)->first()->id;
            } else {
                return redirect()->back()->withErrors(new MessageBag(['Game Genre Must Be Unique']));
            }
        }
        Storage::putFileAs('/public/Game Image', $Photo, $Photo->getClientOriginalName());

        DB::table('games')->insert([
            'GameTitle' => $GameTitle,
            'GameImage' => $Photo->getClientOriginalName(),
            'GamePrice' => $GamePrice,
            'GameDescription' => $GameDescription,
            'PEGIRating' => $PegiRating,
            'gamegenre_id' => $GameGenre,
            'created_at' => now()
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
        $game = Game::find($game->id);
        return view('gamedetail')->with('game', $game);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('Game.editGame')->with('game', $game)->with('genres', GameGenre::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $this->validate($request, [
            'GameTitle' => 'required',
            'GameDescription' => 'required',
            'Photo' => 'mimes:png,jpg | nullable',
            'GamePrice' => 'numeric|min:0'
        ]);
        $GameTitle = $request->GameTitle;
        $Photo = $request->file('Photo');
        $GameDescription = $request->GameDescription;
        $GamePrice = $request->GamePrice;
        $GameGenre = $request->GameGenre;
        $PegiRating = $request->PegiRating;
        if ($Photo != null) {
            if (Storage::exists('public/Game Image/' . $game->GameImage)) {
                Storage::delete('public/Game Image/' . $game->GameImage);
            }
            $Photo = $request->getClientOriginalName();
            Storage::putFileAs('/public/Game Image', $Photo, $Photo->getClientOriginalName());
        } else {
            $Photo = $game->GameImage;
        }
        DB::table('games')->where('id', $game->id)->update([
            'GameTitle' => $GameTitle,
            'GameImage' => $Photo,
            'GamePrice' => $GamePrice,
            'GameDescription' => $GameDescription,
            'PEGIRating' => $PegiRating,
            'gamegenre_id' => $GameGenre,
            'updated_at' => now()
        ]);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        Game::destroy($game->id);
        return redirect('/');
    }
    public function searchGame(Request $request)
    {
        $games = Game::where('GameTitle', 'like', '%' . $request->search . '%')->paginate(20);
        // dd($games);
        return view('home')->with('games', $games);
    }
}
