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
  <label for="initialAmount">Начальная сумма вклада:</label>
  <input type="number" id="initialAmount">
</div>
<div>
  <label for="percent">Годовая процентная ставка:</label>
  <input type="number" id="percent">
</div>
<div>
  <label for="period">Срок в месяцах:</label>
  <input type="number" id="period">
</div>
<div>
  <label for="additionalAmount">Сумма пополнения:</label>
  <input type="number" id="additionalAmount">
</div>
<div>
  <label for="additionalPeriod">Период пополнения в месяцах:</label>
  <input type="number" id="additionalPeriod">
</div>
<button id="calculateBtn">Рассчитать</button>

<div>
  <label>Итоговая сумма:</label>
  <span id="totalAmount"></span>
</div>

        </div>
    </div>
</div>

  </div>
</div>
<script>// Функция для расчета депозита с возможностью пополнения
function calculateDeposit() {
  var initialAmount = parseFloat(document.getElementById('initialAmount').value);
  var percent = parseFloat(document.getElementById('percent').value);
  var period = parseFloat(document.getElementById('period').value);
  var additionalAmount = parseFloat(document.getElementById('additionalAmount').value);
  var additionalPeriod = parseFloat(document.getElementById('additionalPeriod').value);

  // Расчет процентной ставки в месяц
  var interestRate = percent / 100 / 12;

  // Расчет суммы с учетом процентов и начального вклада
  var totalAmount = initialAmount * Math.pow(1 + interestRate, period);

  // Расчет количества пополнений
  var numberOfDeposits = Math.floor(period / additionalPeriod);

  // Расчет суммы пополнений
  var totalAdditionalAmount = additionalAmount * ((Math.pow(1 + interestRate, additionalPeriod) - 1) / interestRate) * numberOfDeposits;

  // Общая сумма с учетом пополнений
  totalAmount += totalAdditionalAmount;

  // Вывод результатов
  document.getElementById('totalAmount').textContent = totalAmount.toFixed(2);
}

// Обработчик события клика на кнопке "Рассчитать"
document.getElementById('calculateBtn').addEventListener('click', calculateDeposit);

</script>


@endsection
