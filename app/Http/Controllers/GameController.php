<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use    App\Models\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $games =Game::orderBy('name')->get();
        return view('game.index',compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('game.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
                    'name'=>'required',
                    'path'=>'required',
                ]);
        // store
        $game=new  Game();
        $game->name=$request->name;
        $game->path=$request->path;
        $game->save();
        return redirect()->route('game.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $game=Game::find($id);
        return view('game.show',compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $game=Game::find($id);
        return view('game.edit',compact('game'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
                            'name'=>'required',
                            'path'=>'required',
                        ]);
        // store
        $game=Game::find($id);
        $game->name=$request->name;
        $game->path=$request->path;
        $game->save();
        return redirect()->route('game.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $game=Game::find($id);
        $game->delete();
        return redirect()->route('game.index');

    }
}
