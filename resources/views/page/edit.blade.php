@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Answer') }}
                <a href="{{ route('page.index') }}">List</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('page.update',$page->id) }}" method="POST">
                   
                    <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$page->title}}">
                    </div>
                    <div class="form_group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug"  value="{{$page->slug}}">
                    </div>
                    <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control ckeditor" id="content" name="content" rows="100">{{$page->content}}</textarea>
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
