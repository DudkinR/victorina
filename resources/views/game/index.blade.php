@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Game') }}
                   
                    <a
                    href="{{ route('game.index') }}"
                    >
                    {{ __('List') }}
                    </a>
                    <a
                    href="{{ route('game.create') }}"
                    >
                    {{ __('Create') }}
                    </a>
                   
                </div>
                <div class="card-body">

                @foreach($games as $game)
                <div class="row">
                <div class="col-md-1">
                {{$game->id}}
                </div>

                <div class="col-md-6">
                {{$game->name}}
                <br>
                {{$game->path}}
                </div>
                <div class="col-md-2">
                <a href="{{ route('game.show',$game->id) }}">Show</a>
                <a href="{{ route('game.edit',$game->id) }}">Edit</a>
                <form action="{{ route('game.destroy',$game->id) }}" method="POST">
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
