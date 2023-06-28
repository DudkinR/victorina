@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Answer') }}
                <a href="{{ route('page.index') }}">List</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('page.store') }}" method="POST">
                    <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="" >
                    </div>
                    <div class="form_group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="">
                    </div>
                    <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control ckeditor" id="content" name="content" rows="3"></textarea>
                    </div>
                     <div class="form-group">
                    <label for="games">Games</label>
                    <!-- select answers [] -->
                    <select multiple class="form-control" id="games" name="games[]">
                    @foreach($games as $game)
                    <option value="{{$game->id}}"
                     >{{$game->name}}</option>
                    @endforeach
                    </select>
                    </div>
                    <div   class="form-group">
                    <label for="topics">Topics</label>
                    <!-- select answers [] -->
                    <select multiple class="form-control" id="topics" name="topics[]">
                    @foreach($topics as $topic)
                    <option value="{{$topic->id}}"
                        >{{$topic->name}}</option>
                    @endforeach
                    </select>
                    </div>

                    @csrf
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
