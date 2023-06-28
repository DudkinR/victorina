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
    <div id="current">
    <input type="hidden" id="current_count" name="current_count" value="1">
     <button id="add_current" class="btn btn-primary">{{__('Добавить операцию')}}</button>
    <div class="form-group">
        <label for="current_0">{{__('Колличество денег в операции')}}:</label>
        <input type="number" class="form-control" id="current_0" name="current_0" >
        <label for="month_0">{{__('Время после начала вклада')}}:</label>
        <input type="number" class="form-control" id="month_0" name="month_0" >
        <label for="operation_0">{{__('Операция')}}:</label>
        <input type="radio" id="operation_0" name="operation_0" value="1" > "+"
        <input type="radio" id="operation_0" name="operation_0" value="0" checked> "-"
    </div>


   
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
        var money = parseFloat($('#money').val());
        var percent = parseFloat($('#percent').val());
        var month = parseFloat($('#month').val());
        var fullresult = parseFloat($('#fullresult').val());
        var resultPr = parseFloat($('#resultPr').val());
        var current_count = parseInt($('#current_count').val());
        var current = [];

        // Получение данных из полей текущих операций
        for (var i = 0; i < current_count; i++) {
            var moneyCurrent = parseFloat($('#current_' + i).val());
            var monthCurrent = parseFloat($('#month_' + i).val());
            var operationCurrent = parseFloat($('input[name="operation_' + i + '"]:checked').val());

            current.push({
                money: moneyCurrent,
                month: monthCurrent,
                operation: operationCurrent
            });
        }

        // Сортировка массива current по возрастанию month
        current.sort(function(a, b) {
            return a.month - b.month;
        });
       
        // Расчет денег за время спокойного периода и добавление процентов
        var currentMonth = 0;
        var currentMoney = money;
        for (var i = 0; i < current.length; i++) {
            var operation = current[i].operation;
            var monthDiff = current[i].month - currentMonth;
            var interest = currentMoney * (percent / 100) * (monthDiff / 12);
              console.log(interest);
            if (operation === 1) {
                currentMoney += current[i].money + interest;
            } else {
                currentMoney -= current[i].money - interest;
            }

            currentMonth = current[i].month;
        }

        // Расчет за весь период
        var interestTotal = currentMoney * (percent / 100) * (month / 12);
        var resultTotal = currentMoney + interestTotal;
        var resultProfit = resultTotal - money;

        // Обновление значений полей результатов
        $('#fullresult').val(resultTotal.toFixed(2));
        $('#resultPr').val(resultProfit.toFixed(2));
    });
    $('#add_current').click(function() {
        var current_count = $('#current_count').val();
        var current = $('#current');
        var new_current = '<div class="form-group"><label for="current_'+current_count+'">{{__("Колличество денег в операции")}}:</label><input type="number" class="form-control" id="current_'+current_count+'" name="current_'+current_count+'" ><label for="month_'+current_count+'">{{__("Время после начала вклада")}}:</label><input type="number" class="form-control" id="month_'+current_count+'" name="month_'+current_count+'" ><label for="operation_'+current_count+'">{{__("Операция")}}:</label><input type="radio" id="operation_'+current_count+'" name="operation_'+current_count+'" value="1"> "+"<input type="radio" checked id="operation_'+current_count+'" name="operation_'+current_count+'" value="0"> "-"</div>';
        current.append(new_current);
        current_count++;
        $('#current_count').val(current_count);
    });
});
  function res(money,percent,month)  {
       var result = money * (1 + percent/100 * month/12);
       return result;
  }
</script>


@endsection
