@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <a href="{{ route('answer.index') }}">List</a>

                </div>
                <div class="card-body">
                       <p>{{$answer->content}}</p>
                    <p>Created at: {{$answer->created_at}}</p>
                    <p>Updated at: {{$answer->updated_at}}</p>
                    <a href="{{route("answer.edit", $answer->id)}}" >Edit</a>
                    <form action="{{ route('answer.destroy',$answer->id) }}" method="POST">
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
