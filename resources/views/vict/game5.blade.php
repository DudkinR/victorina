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
  <div id="spinner" style="display: none;">Loading...</div>

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
    <!-- container with img and answer -->
    <div class="card">
        <div class="card-body">
            <ul class="list-group">
                @foreach($answers as $answer)
                    <li>
                        <a class="btn answer-btn" onclick="Goright({{$answer->id}})" value="{{ $answer->id }}" data-answer-id="{{ $answer->id }}">
                            <h1>{{$answer->content}}</h1>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

  </div>
</div>
<script>
$(document).ready(function() {
    var nextPage = parseInt("{{ $questions->currentPage() }}") + 1;
    $('.answer-btn').click(function() {
      document.body.style.cursor = 'wait'; // Изменение курсора на "ожидание" для всего тела документа
        var val = $(this).attr('value');
        var answerBtns = $('.answer-btn');
            $(this).css('background-color', '#00ff00');
            setTimeout(function() {
               window.location.href = '/vict5?page=' + nextPage+'&answ='+val+'&q={{$question->id}}'+'&topic={{$topic->id}}';
            }, 1000);
    });
});
</script>


@endsection
