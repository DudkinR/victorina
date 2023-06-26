@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Answer') }}
                   
                    <a
                    href="{{ route('page.index') }}"
                    >
                    {{ __('List') }}
                    </a>
                    <a
                    href="{{ route('page.create') }}"
                    >
                    {{ __('Create') }}
                    </a>
                   
                </div>
                <div class="card-body">

                @foreach($pages as $page)
                <div class="row">
                   <div class="col-md-12">
                 {{$page->id}}
                  <h1>{{$page->title}}</h1>
                  <h6>{!!$page->slug!!} </h6>
                      {!!$page->content!!}
     
                <a href="{{ route('page.show',$page->id) }}">Show</a>
                <a href="{{ route('page.edit',$page->id) }}">Edit</a>
                <form action="{{ route('page.destroy',$page->id) }}" method="POST">
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
