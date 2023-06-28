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
            <div>
              <label for="money">Сумма вклада:</label>
              <input type="number" id="money">
            </div>
            <div>
              <label for="percent">Годовая процентная ставка:</label>
              <input type="number" id="percent">
            </div>
            <div>
              <label for="period">Срок в месяцах:</label>
              <input type="number" id="period">
            </div>
            <button id="calculateBtn">Рассчитать</button>

            <div>
              <label>Итоговая сумма:</label>
              <span id="totalAmount"></span>
            </div>
            <div>
              <label>Прибыль:</label>
              <span id="profit"></span>
            </div>
        </div>
    </div>
</div>

  </div>
</div>
<script>
// Функция для расчета сберегательного депозита
function calculateDeposit() {
  var money = parseFloat(document.getElementById('money').value);
  var percent = parseFloat(document.getElementById('percent').value);
  var period = parseFloat(document.getElementById('period').value);
  
  // Расчет процентной ставки в месяц
  var interestRate = percent / 100 / 12;
  
  // Расчет суммы с учетом процентов
  var totalAmount = money * Math.pow(1 + interestRate, period);
  
  // Расчет прибыли
  var profit = totalAmount - money;
  
  // Вывод результатов
  document.getElementById('totalAmount').textContent = totalAmount.toFixed(2);
  document.getElementById('profit').textContent = profit.toFixed(2);
}

// Обработчик события клика на кнопке "Рассчитать"
document.getElementById('calculateBtn').addEventListener('click', calculateDeposit);


</script>


@endsection
