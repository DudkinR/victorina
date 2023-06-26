@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Answer') }}
                   
                    <a
                    href="{{ route('answer.index') }}"
                    >
                    {{ __('List') }}
                    </a>
                    <a
                    href="{{ route('answer.create') }}"
                    >
                    {{ __('Create') }}
                    </a>
                   
                </div>
                <div class="card-body">

                @foreach($answers as $answer)
                <div class="row">
                <div class="col-md-1">
                {{$answer->id}}
                </div>

                <div class="col-md-6">
                {{$answer->content}}
                </div>
                <div class="col-md-2">
                <a href="{{ route('answer.show',$answer->id) }}">Show</a>
                <a href="{{ route('answer.edit',$answer->id) }}">Edit</a>
                <form action="{{ route('answer.destroy',$answer->id) }}" method="POST">
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
