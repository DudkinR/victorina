@extends('layouts.app')
@section('content')
<div class="container">
  <div class=  "row justify-content-center">
     <div class="col-sm-6" >
     <!-- container with img and answer -->
            <div class="card">
                <div class="card-header">
                <h1> {{$topic->name }} </h1>
                </div>
                <div class="card-body">
                   <img src="{{ asset('storage/images/'.$topic->image) }}"  alt="Responsive image" width=300 >
                     <h4> {{$topic->description }} </h4>
                </div>
            </div>
     </div>
<div class="col-sm-6">
    <!-- container with img and answer -->
    <div class="card">
        <div class="card-body">

    <div class="form-group">
        <label for="money">{{__('Сколько денег клиент вкладывает')}}:</label>
    <input type="number" class="form-control" id="money" name="money" >
    </div>
    <div class="form-group">
        <label for="percent">{{__('Процент годовой')}}:</label>
    <input type="number" class="form-control" id="percent" name="percent" >
    </div>
    <div class="form-group">
        <label for="month">{{__('Срок вклада (мес.)')}}:</label>
    <input type="number" class="form-control" id="month" name="month" >
    </div>
    <div class="form-group">
        <label>{{__('К получению в конце срока')}}:</label>
        <h1 id="fullresult"></h1>
    </div>
    <div class="form-group">
        <label>{{__('Сколько денег заработано')}}:</label>
        <h1 id="resultPr"></h1>
    </div>
    <button id="count_btn" class="btn btn-primary">{{__('Рассчитать')}}</button>

        </div>
    </div>
</div>

  </div>
</div>
<script>
$(document).ready(function() {
    $('#count_btn').click(function() {
        var money = $('#money').val();
        var percent = $('#percent').val();
        var month = $('#month').val();
        var fullresult = $('#fullresult').val();
        var resultPr = $('#resultPr').val();
        var result = money * (1 + percent/100 * month/12);
        $('#fullresult').text(result);
        $('#resultPr').text(result - money);
    });
});

</script>


@endsection
