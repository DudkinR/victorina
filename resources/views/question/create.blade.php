@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                <a href="{{ route('question.index') }}">List</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('question.store') }}" method="POST">
                    <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" >
                    </div>
                    <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                    </div  >
                   
    
                    <!-- answer true   -->
                    <div class="form-group">
                    <label for="answer_true">Answer true</label>
                    <!-- select answers [] -->
                    <select multiple class="form-control" id="answer_true" name="answer_true[]">
                    @foreach($answers as $answer)
                    <option value="{{$answer->id}}">{{$answer->content}}</option>
                    @endforeach
                    </select>
                    </div>
                    <!-- answer false   -->
                    <div class="form-group">
                    <label for="answer_false">Answer false</label>
                    <!-- select answers [] -->
                    <select multiple class="form-control" id="answer_false" name="answer_false[]">
                    @foreach($answers as $answer)
                    <option value="{{$answer->id}}">{{$answer->content}}</option>
                    @endforeach
                    </select>
                    </div>
                      <!-- answer new  -->
                    <div class="container" id = "new_answers">
                          <input type="hidden" id="count_answer" name="count_answer" value="0">
                    <button type="button" class="btn btn-primary" id="add_answer" onclick="AddNewAnswer()" >Add answer</button>
                    </div>
                    <script type="text/javascript">
                    function AddNewAnswer(){
                    var new_answers= document.getElementById("new_answers");
                    var count_answer = document.getElementById("count_answer").value;
                    count_answer++;
                    document.getElementById("count_answer").value = count_answer;
                    var new_answer = document.createElement("div");
                    new_answer.setAttribute("class", "form-group");
                    new_answer.setAttribute("id", "answer_"+count_answer);
                    var new_answer_label = document.createElement("label");
                    new_answer_label.setAttribute("for", "answer_"+count_answer+"_new");
                    new_answer_label.innerHTML = "Answer new";
                    var new_answer_input = document.createElement("input");
                    new_answer_input.setAttribute("type", "text");
                    new_answer_input.setAttribute("class", "form-control");
                    new_answer_input.setAttribute("id", "answer_"+count_answer+"_new");
                    new_answer_input.setAttribute("name", "answer_"+count_answer+"_new");
                    new_answer.appendChild(new_answer_label);
                    new_answer.appendChild(new_answer_input);
                    var new_answer_check = document.createElement("div");
                    new_answer_check.setAttribute("class", "form-check");
                    var new_answer_check_input = document.createElement("input");
                    new_answer_check_input.setAttribute("class", "form-check-input");
                    new_answer_check_input.setAttribute("type", "checkbox");
                    new_answer_check_input.setAttribute("value", "1");
                    new_answer_check_input.setAttribute("id", "answer_"+count_answer+"_true");
                    new_answer_check_input.setAttribute("name", "answer_"+count_answer+"_true");
                    var new_answer_check_label = document.createElement("label");
                    new_answer_check_label.setAttribute("class", "form-check-label");
                    new_answer_check_label.setAttribute("for", "answer_"+count_answer+"_true");
                    new_answer_check_label.innerHTML = "True";
                      new_answers.appendChild(new_answer);
                    new_answer_check.appendChild(new_answer_check_input);
                    new_answer_check.appendChild(new_answer_check_label);
                    new_answer.appendChild(new_answer_check);

                    }

                    </script>

                    @csrf
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
