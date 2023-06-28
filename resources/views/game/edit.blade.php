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
                    <form action="{{ route('game.update',$game->id) }}" method="POST">
                           <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$game->name}}" >                    
                    </div>
                    <div class="form_group">
                    <label for="path">Path</label>
                    <input type="text" class="form-control" id="path" name="path" value="{{$game->path}}">
                    </div>
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
