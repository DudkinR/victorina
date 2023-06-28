@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Game') }}
                    <a href="{{ route('game.index') }}">List</a>

                </div>
                <div class="card-body">
                       <p>{{$game->name}}</p>
                       <p>{{$game->path}}</p>
                    <a href="{{route("game.edit", $game->id)}}" >Edit</a>
                    <form action="{{ route('game.destroy',$game->id) }}" method="POST">
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
