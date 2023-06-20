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
                   <h1>{{$question->name}}</h1>
                    <p>{{$question->content}}</p>
                    <p>Created at: {{$question->created_at}}</p>
                    <p>Updated at: {{$question->updated_at}}</p>
                    <p> Correct answers:
                    <ul>
                    @foreach($correct_answers as $answer)
                        <li>{{$answer->content}}</li>
                    @endforeach
                    </ul>
                    </p>
                    <p> Incorrect answers:
                    <ul>
                    @foreach($uncorrect_answers as $answer)
                        <li>{{$answer->content}}</li>
                    @endforeach
                    </ul>
                    </p>
                    <a href="{{route("question.edit", $question->id)}}" >Edit</a>
                    <form action="{{ route('question.destroy',$question->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
