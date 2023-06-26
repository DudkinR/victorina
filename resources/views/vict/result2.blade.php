@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Result') }}</div>
              <div class="card-body" style="position: relative; width: 400px; height: 400px; background-image: url('{{ asset('storage/images/'.$topic->image) }}'); background-size: cover;">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 80%; height: 80%;">
        <div style="width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); display: flex; align-items: center; justify-content: center;">
            <span style="color: white; font-size: 72px; display: block; width: 100%;">
                {{ number_format($percent, 1) }} %
            </span>
          
        </div>
    </div>
</div>

                <div class="card-footer">
                  @if(isset($average))
            <span style="color: grey; font-size: 72px; display: block; width: 100%;">
                {{ number_format($average, 1) }} %
            </span>
            @endif
                  <a href="{{ route('vict.game'.$game) }}" class="btn btn-primary">Back</a>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
