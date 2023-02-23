<?php

namespace App\Http\Controllers;

use App\Models\GameGenre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameGenreController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('adminAuth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('GameGenre.manageGameGenre')->with('genres', GameGenre::all());
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GameGenre  $gameGenre
     * @return \Illuminate\Http\Response
     */
    public function show(GameGenre $gameGenre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GameGenre  $gameGenre
     * @return \Illuminate\Http\Response
     */
    public function edit(GameGenre $gameGenre , Request $request)
    {
        return view('GameGenre.editGameGenre')->with('genre', GameGenre::find($request->route('gamegenre')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GameGenre  $gameGenre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GameGenre $gameGenre)
    {
        //
        $this->validate($request, [
            'genre' => 'required',
        ]);
        $genre = $request->genre;
        DB::table('game_genres')->where('id', $request->route('gamegenre'))->update([
            'genre' => $genre,
            'updated_at' => now()
        ]);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GameGenre  $gameGenre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        GameGenre::destroy($request->gamegenre);
        return redirect('/');
    }
}
