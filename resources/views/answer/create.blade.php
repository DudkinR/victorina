@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Answer') }}
                <a href="{{ route('answer.index') }}">List</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('answer.store') }}" method="POST">
                    <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
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
