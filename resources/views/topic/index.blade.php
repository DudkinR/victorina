@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Topic') }}
                   
                    <a
                    href="{{ route('topic.index') }}"
                    >
                    {{ __('List') }}
                    </a>
                    <a
                    href="{{ route('topic.create') }}"
                    >
                    {{ __('Create') }}
                    </a>
                   
                </div>
                <div class="card-body">

                @foreach($topics as $topic)
                <div class="row">
                <div class="col-md-1">
                {{$topic->id}}
                </div>

                <div class="col-md-6">
               <h1>{{$topic->name}}</h1>
               <h2>{{$topic->slug}}</h2>
               <p>
               <img src="{{ asset('storage/images/' . $topic->image) }}" alt="image" width="100" height="100">
               {{$topic->description}}
               </p>

                </div>
                <div class="col-md-2">
                <a href="{{ route('topic.show',$topic->id) }}">Show</a>
                <a href="{{ route('topic.edit',$topic->id) }}">Edit</a>
                <form action="{{ route('topic.destroy',$topic->id) }}" method="POST">
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
