@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Result') }}</div>
              <div class="card-body">
                   @foreach($result as $question)
                   <div class="row border">
                       <div class="col-md-6">
                           <h1>{{$question['name']}}</h1>
                           <p>{{$question['content']}}</p>
                       </div>
                       <div class="col-md-6 bg=info">
                         <ul>
                           @foreach($question['answers'] as $quest)
                            <li>{{$quest['content']}} - {{$quest['count']}}</li>
                           @endforeach
                         </ul>
                       </div>
                   </div>
                   @endforeach
                                        
              </div>
              <div class="card-footer">
                   <a href="{{ route('vict.game'.$game) }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
