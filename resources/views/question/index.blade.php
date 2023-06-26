@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Questions') }}
                   
                    <a
                    href="{{ route('question.index') }}"
                    >
                    {{ __('List') }}
                    </a>
                    <a
                    href="{{ route('question.create') }}"
                    >
                    {{ __('Create') }}
                    </a>
                   
                </div>
                <div class="card-body">

                @foreach($questions as $question)
                <div class="row">
                <div class="col-md-1">
                {{$question->id}}
                </div>
                <div class="col-md-3">
                {{$question->name}}
                </div>
                <div class="col-md-3">
                {{$question->content}}
                </div>
                <div class="col-md-2">
                <a href="{{ route('question.show',$question->id) }}">Show</a>
                <a href="{{ route('question.edit',$question->id) }}">Edit</a>
                <form action="{{ route('question.destroy',$question->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
                </form>
                </div>
                </div>
                @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
