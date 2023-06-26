@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card-header"> <h1>{{$page->title}}</h1>
                    <a href="{{ route('home') }}" class="btn btn-primery" >back</a>

                </div>
                <div class="card-body">
               
                      {!!$page->content!!}
       
                </div>
            </div>
      </div>
</div>
@endsection
