<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $answers = Answer::all();
return view('answer.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
return view('answer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
$answer = new Answer();
$answer->content = $request->input('content');
$answer->save();
return redirect()->route('answer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
         $answer=Answer::find($id);
return view('answer.show', compact('answer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
$answer=Answer::find($id);
return view('answer.edit', compact('answer'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
$answer=Answer::find($id);
$answer->content = $request->input('content');
$answer->save();
return redirect()->route('answer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

$answer=Answer::find($id);
$answer->delete();
return redirect()->route('answer.index');

    }
}
