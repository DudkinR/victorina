<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use    App\Models\Answer;
use    App\Models\Topic;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $questions = Question::orderBy('id', 'desc')->get();
        return view('question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $answers = Answer::all();
        $topics = Topic::all();
        return view('question.create', ['answers'=>$answers,'topics'=>$topics ] );
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

                ]);
            if(isset($request->topic) && $request->topic>0) {
            $t_id=$request->topic;
            $request->session()->put('topic_id', $request->topic);
            }
            else
            $t_id=0;
        if(trim($request->name)=='--separate--'){
          //  $sep_name = explode ('\n', $request->content);
          $sep_name = explode(PHP_EOL, $request->content);

            //$n=$c=$ep_name
            foreach($sep_name as $n){
                if(trim($n)!=='')
                $this->add_one_question($t_id,$n,$n);
             }
        }
        else {
	       $qw= $ths->add_one_question($t_id,$request->name,$request->content);
               $qw->answers()->attach($request->answer_true, ['is_correct' => 1]);
        //  	is_correct = 0
        $qw->answers()->attach($request->answer_false, ['is_correct' => 0]);
       // return $qw->answers;
       foreach($request->all() as $key => $value){
           //answer_ _new
           $key_w=explode('_',$key);
          if(count($key_w)==3) {
            if($key_w[0]=='answer' && $key_w[2]=='new' && trim($value)!==''){
                $answer=new Answer;
                $answer->content=$value;
                $answer->save();
                if (isset($request->{'answer_'.$key_w[1].'_true'}))

                $qw->answers()->attach($answer->id, ['is_correct' => 1]);
                else
                $qw->answers()->attach($answer->id, ['is_correct' => 0]);
              }
            }
       }

        }
         
        return redirect()->route('question.index')
         ->with('success','Question created successfully.');
    }
    public function add_one_question($t_id,$n,$c){
        $question=new Question;
        $question->name=$n;
        $question->content=$c;
        $question->save();
        if($t_id>0)
        $question->topics()->attach($t_id);
        return $question;
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
        $topics=Topic::all();
        $correct_answers = $question->answers()->wherePivot('is_correct', 1)->get();
        $uncorrect_answers = $question->answers()->wherePivot('is_correct', 0)->get();
        //return $uncorrect_answers->pluck('id')->toArray();
        return view('question.edit',compact('question','answers','correct_answers','uncorrect_answers','topics' ));

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
           if(count($key_w)==3) {
            if($key_w[0]=='answer' && $key_w[2]=='new'){
                if(trim($value)!==''){
                $answer=new Answer;
                $answer->content=$value;
                $answer->save();
               if (isset($request->{'answer_'.$key_w[1].'_true'}))
                $question->answers()->attach($answer->id, ['is_correct' => 1]);
                else
                $question->answers()->attach($answer->id, ['is_correct' => 0]);
              }
            }
           }
       }
// Topic
        $question->topics()->detach();
$question->topics()->attach($request->topic);

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
$question->answers()->detach();
$question->topics()->detach();
$question->delete();
return redirect()->route('question.index')
                        ->with('success','Question deleted successfully');
    }
}
