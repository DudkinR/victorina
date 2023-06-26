@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Victorina') }}</div>
              <div class="card-body">
                   @foreach($topics as $topic)
                   <div class="row border">
                       <div class="col-md-10">
                         <img src="{{ asset('storage/images/' . $topic->image) }}" alt="image" width="100" height="100">
                                <p>
                                {{$topic->description}}
                               </p>
                       </div>
                       <div class="col-md-2 bg=info">
                          <a   href="{{ route('vict.game'.$game) }}?topic={{$topic->id}}" class="btn btn-primary">Start</a>
                       </div>
                   </div>
                   @endforeach
                                        
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
