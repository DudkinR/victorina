<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use    App\Models\Answer;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $questions = Question::all();
        return view('question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $answers = Answer::all();
return view('question.create', ['answers'=>$answers] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
                    'name' => 'required',
                    'content' => 'required',
                    'answer_true' => 'required',
                    'answer_false'=> 'required'
                ]);
                $qw=new Question;
        $qw->name=$request->name;
        $qw->content=$request->content;
        $qw->save();
        //  	is_correct = 1
        $qw->answers()->attach($request->answer_true, ['is_correct' => 1]);
        //  	is_correct = 0
        $qw->answers()->attach($request->answer_false, ['is_correct' => 0]);
       // return $qw->answers;
       foreach($request->all() as $key => $value){
           //answer_ _new
           $key_w=explode('_',$key);
            if($key_w[0]=='answer' && $key_w[2]=='new'){
                $answer=new Answer;
                $answer->content=$value;
                $answer->save();
                if (isset($request->{'answer_'.$key_w[1].'_true'}))

                $qw->answers()->attach($answer->id, ['is_correct' => 1]);
                else
                $qw->answers()->attach($answer->id, ['is_correct' => 0]);
              }
       }
        return redirect()->route('question.index')
                                ->with('success','Question created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $question=Question::find($id);
        $correct_answers = $question->answers()->wherePivot('is_correct', 1)->get();
        $uncorrect_answers = $question->answers()->wherePivot('is_correct', 0)->get();
        return view('question.show',compact('question','correct_answers','uncorrect_answers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $question=Question::find($id);
        $answers = Answer::all();
        $correct_answers = $question->answers()->wherePivot('is_correct', 1)->get();
        $uncorrect_answers = $question->answers()->wherePivot('is_correct', 0)->get();
        //return $uncorrect_answers->pluck('id')->toArray();
        return view('question.edit',compact('question','answers','correct_answers','uncorrect_answers' ));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
                    'name' => 'required',
                    'content' => 'required',
                 
                ]);
        $question=Question::find($id);
        $question->name=$request->name;
        $question->content=$request->content;
        $question->save();
        // deleted  old answers
        $question->answers()->detach();
        //  	is_correct = 1
        $question->answers()->attach($request->answer_true, ['is_correct' => 1]);
        //  	is_correct = 0
        $question->answers()->attach($request->answer_false, ['is_correct' => 0]);
               foreach($request->all() as $key => $value){
           //answer_ _new
           $key_w=explode('_',$key);
            if($key_w[0]=='answer' && $key_w[2]=='new'){
                $answer=new Answer;
                $answer->content=$value;
                $answer->save();
               if (isset($request->{'answer_'.$key_w[1].'_true'}))
                $qw->answers()->attach($answer->id, ['is_correct' => 1]);
                else
                $qw->answers()->attach($answer->id, ['is_correct' => 0]);
              }
       }

        return redirect()->route('question.show', ['question'=>$question] )
                                ->with('success','Question updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
$question=Question::find($id);
$question->delete();
return redirect()->route('question.index')
                        ->with('success','Question deleted successfully');
    }
}
