<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Topic;
use App\Models\StatFree;
use App\Models\StatUser;
use App\Models\StatAnketa;
// Auth
use Illuminate\Support\Facades\Auth;

use Illuminate\Pagination\Paginator;


class VictController extends Controller
{

// index
public function index(Request $request)
{
    $topics = Topic::all();
    if(isset($request->v))
    $game = $request->v;
    else $game = 1;
    return view('vict.index', ['topics' => $topics, 'game'=> $game]);
}

public function topic_now(Request $request){
        if(!isset($request->topic))
    $topic = Topic::first();
    else {
   if(!$topic = Topic::find($request->topic)) {
       $topic = Topic::first();
  
    }
    }
    return $topic;
}

public function vict1(Request $request)
{
    // викторина которая принимает вопросы и ответы но не где не фиксирует результаты и не сохраняет их
    $topic= $this->topic_now($request);

   // если не последняя страница то
    if($request->page != $topic->questions()->paginate(1)->lastPage())
    {
    $questions = $topic->questions()
   ->paginate(1);
   
    return view('vict.game1', ['topic' => $topic, 'questions' => $questions]);
    }
    else{
        $count_questions = $topic->questions()->count();
        $percent = $result*100/$count_questions;
        return view('vict.result2', ['topic' => $topic,'result' => 100, 'game'=>1, 'percent'=>100]);
    }
}
  public function vict2(Request $request)
{
    // викторина которая принимает вопросы и ответы сохраняет результат в сессию и показывает результаты в конце  result2.blade.php
 $topic= $this->topic_now($request);
    $result = 0;
    if(isset($request->r)){
      $result= $request->r;
   }

   // если не последняя страница то
    if($request->page != $topic->questions()->paginate(1)->lastPage())
    {
   $questions = $topic->questions()
   ->paginate(1);
  
    return view('vict.game2', ['topic' => $topic, 'questions' => $questions,'result'=>$result]);
    }
    else{
         // count questions 100% correct $result
        $count_questions = $topic->questions()->count();
        $percent = $result*100/$count_questions;
        return view('vict.result2', ['topic' => $topic,'result' => $result, 'game'=>2, 'percent'=>$percent]);
  
    }
 }
public function vict3(Request $request){
     // викторина которая принимает вопросы и ответы сохраняет результат в сессию и показывает результаты в конце  result3.blade.php
   $topic= $this->topic_now($request);
    $result = 0;
    if(isset($request->r)){
      $result= $request->r;
       $a=$request->a;
        $q=$request->q;
        $question = Question::find($q);
        $statfree= new StatFree;
        $statfree->topic_id=$topic->id;
        $statfree->question_id=$q;
        $statfree->result=$a*100;
        $statfree->save();
   }

   // если не последняя страница то
    if($request->page != $topic->questions()->paginate(1)->lastPage())
    {
           $questions = $topic->questions()
           ->paginate(1);
           return view('vict.game3', ['topic' => $topic, 'questions' => $questions,'result'=>$result]);
    }
    else{
         // count questions 100% correct $result
        $count_questions = $topic->questions()->count();
        $percent = $result*100/$count_questions;

        $averageResult =  StatFree::where('topic_id',$topic->id)->avg('result');
       //->average('result');
        return view('vict.result2', ['topic' => $topic,'result' => $result,'game'=>3, 'percent'=>$percent, 'average'=>$averageResult]);
  
    }

}
 public function vict4(Request $request){
     // викторина которая принимает вопросы и ответы сохраняет результат в user_id
     // если пользователь не авторизован то редирект на авторизацию
    if(!Auth::check()){
            return redirect()->route('login');
        }
     $topic= $this->topic_now($request);
    $result = 0;
    if(isset($request->r)){
      $result= $request->r;
       $a=$request->a;
        $q=$request->q;
        $question = Question::find($q);
        $statfree= new StatUser;
        $statfree->topic_id=$topic->id;
        $statfree->user_id=Auth::user()->id;
        $statfree->question_id=$q;
        $statfree->result=$a*100;
        $statfree->save();
   }

   // если не последняя страница то
    if($request->page != $topic->questions()->paginate(1)->lastPage())
    {
           $questions = $topic->questions()
           ->paginate(1);
           return view('vict.game4', ['topic' => $topic, 'questions' => $questions,'result'=>$result]);
    }
    else{
         // count questions 100% correct $result
        $count_questions = $topic->questions()->count();
        $percent = $result*100/$count_questions;
        $averageResult =  StatUser::where('topic_id',$topic->id)
        ->where('user_id',Auth::user()->id)
        ->avg('result');
       //->average('result');
        return view('vict.result2', ['topic' => $topic,'result' => $result,'game'=>4, 'percent'=>$percent, 'average'=>$averageResult]);
        }
    }
    public function vict5(Request $request){
     // простая анкета анонимная
     $topic= $this->topic_now($request);
     if(isset($request->q)&&isset($request->answ))
     {
        $statAnketa = new StatAnketa;
        $statAnketa->topic_id=$topic->id;
        $statAnketa->question_id=$request->q;
        $statAnketa->answer_id=$request->answ;
        $statAnketa->save();

     }
       if($request->page != $topic->questions()->paginate(1)->lastPage())
        {
               $questions = $topic->questions()
               ->paginate(1);
               return view('vict.game5', ['topic' => $topic, 'questions' => $questions]);
        }
        else{
          $RS = StatAnketa::where('topic_id', $topic->id)
            ->selectRaw('question_id, answer_id, count(*) as count')
            ->groupBy('question_id', 'answer_id')
            ->get();
            $result = array();
            foreach($RS as $key => $value) {
                $result[$value->question_id]['name']=Question::find($value->question_id)->name;
                $result[$value->question_id]['content']=Question::find($value->question_id)->content;
                $result[$value->question_id]['answers'][$value->answer_id]['count']=$value->count;
                $result[$value->question_id]['answers'][$value->answer_id]['content']=Answer::find($value->answer_id)->content;
            }
            return view('vict.result', ['topic' => $topic, 'result'=>$result, 'game'=>5 ]);
        }
    }
public function vict6(Request $request){
     // простая анкета анонимная
   $topic = $this->topic_now($request);
  // return $request->result;   
    if (isset($request->result)) {
        $ans = explode(',', $request->result);
      
        if (count($ans) >= 1) {     
            foreach ($ans as $value) {
                // Check if the answer is correct
                if ($request->has('right_i_'.$value)) {
                    // Handle the correct answer
                    $correctAnswer = $request->input('right_i_'.$value);
                   $value= $this->addNewUserAnser($correctAnswer);
                }

                // Save the user's answer in the database
                $statAnketa = new StatAnketa;
                $statAnketa->topic_id = $topic->id;
                $statAnketa->question_id = $request->q;
                $statAnketa->answer_id = $value;
                $statAnketa->save();
            }
        }
    }

       if($request->page != $topic->questions()->paginate(1)->lastPage())
        {
               $questions = $topic->questions()
               ->paginate(1);
//return  $isCorrectValues = $questions->first()->answers()->pluck('is_correct');

               return view('vict.game6', ['topic' => $topic, 'questions' => $questions]);
        }
        else{
          $RS = StatAnketa::where('topic_id', $topic->id)
            ->selectRaw('question_id, answer_id, count(*) as count')
            ->groupBy('question_id', 'answer_id')
            ->get();
            $result = array();
            foreach($RS as $key => $value) {
                $result[$value->question_id]['name']=Question::find($value->question_id)->name;
                $result[$value->question_id]['content']=Question::find($value->question_id)->content;
                $result[$value->question_id]['answers'][$value->answer_id]['count']=$value->count;
                $result[$value->question_id]['answers'][$value->answer_id]['content']=Answer::find($value->answer_id)->content;
            }
            return view('vict.result', ['topic' => $topic, 'result'=>$result, 'game'=>6 ]);
        }
    }
public function addNewUserAnser($content){
        $answer = new Answer();
        $answer->content = $content;
        $answer->user_id = Auth::id();
        $answer->permission=0;
        $answer->save();
       return $answer->id;
}

}
