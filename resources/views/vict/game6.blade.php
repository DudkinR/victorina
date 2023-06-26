@extends('layouts.app')
@section('content')
<?php
$curent_page = $questions->currentPage();
$question = $questions->first();
if( $question->answers() )
$answers = $question->answers()->get();
else $answers =[];

// перемешать ответы
$answers = $answers->shuffle();
?>
<div class="container">
  <div class=  "row justify-content-center">
     <div class="col-sm-6" >
     <!-- container with img and answer -->
            <div class="card">
                <div class="card-header">
                <h6> {{$topic->name }} </h6>
                  <h1> {{$question->content }} </h1>
                </div>
                <div class="card-body">
                   <img src="{{ asset('storage/images/'.$topic->image) }}"  alt="Responsive image" width=500 >
                </div>
            </div>
     </div>
<div class="col-sm-6">
  <form id="form" action="{{ route('vict.game6') }}" method="POST">
                @csrf
    <!-- container with img and answer -->
    <div class="card">
        <div class="card-body">
            <ul class="list-group" style="list-style-type: none">
                @foreach($answers as $answer)
                  @if($answer->permision == 1)
                    <li class="border">
                        <a class="btn answer-btn" onclick="Goright({{$answer->id}})" value="{{ $answer->id }}" data-answer-id="{{ $answer->id }}">
                            <p>{{$answer->content}}</p>
                        </a>
                        @if($answer->pivot->is_correct == 1)
                                <p id="right_{{$answer->id}}" style="display:none;" >
                                    <input class="form-control" type="text"  name="right_i_{{$answer->id}}" id="right_i_{{$answer->id}}" value="">
                                </p>
                            @endif
                    </li>
                  @endif
                @endforeach
              
                <input type="hidden" name="result" id="result" value="">
                <input type="hidden" name="topic" id="topic" value="{{$topic->id}}">
                <input type="hidden" name="q" id="question" value="{{$question->id}}">
                <input type="hidden" name="page" id="page" value="{{$questions->currentPage()+1}}">
                <li>
                <button type="submit" class="btn btn-success"   >
                    <h1>Send</h1>
                </button>
                </li>
                </form>

            </ul>
        </div>
    </div>
</div>

  </div>
</div>

<script>
 var result = [];

$(document).ready(function() {
    $('.answer-btn').click(function() {
        var val = $(this).attr('value');
        var answerBtns = $('.answer-btn');
        
        if (result.includes(val)) {
            result.splice(result.indexOf(val), 1);
            $(this).css('background-color', '#ffffff');
            // если есть элемент   с id right_+val то делаем его невидимым
            if ($('#right_'+val).length) {
                $('#right_'+val).css('display', 'none');
            }
        } else {
            
            result.push(val);
            $(this).css('background-color', '#00ff00');
            // если есть элемент   с id right_+val то делаем его видимым
            if ($('#right_'+val).length) {
                $('#right_'+val).css('display', 'block');
            }
        }
        
        $('#result').val(result);
    });
     $('#form').submit(function(e) {
        if (result.length === 0) {
            e.preventDefault(); // Prevent form submission
            // Optionally, you can display an error message to the user
            alert('Please select at least one answer');
        }
    });
});
 
</script>



@endsection
