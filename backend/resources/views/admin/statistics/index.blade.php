@extends('layouts.app')

@section('content')

<div class="container">
    <canvas id="revenueChart"></canvas>
    <canvas id="orderNumberChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    const labels = [
      'Gennaio',
      'Febbraio',
      'Marzo',
      'Aprile',
      'Maggio',
      'Giugno',
      'Luglio',
      'Agosto',
      'Settembre',
      'Ottobre',
      'Novembre',
      'Dicembre'
    ];


    // revenue chart
    let revenueOrders = {!! json_encode($orders) !!};

    let revenueData = [];
    let checkPush = false;

    for(let i = 1; i < 13; i++) {

        checkPush = false;

        revenueOrders.forEach(order => {
            if (order.month == i) {
                revenueData.push(order.total);
                checkPush = true;
            }
        });

        if (!checkPush) {
            revenueData.push(0);
        }

    }

    const dataRevenue = {
      labels: labels,
      datasets: [
        {
            label: 'Fatturato anno corrente',
            backgroundColor: 'rgb(67, 72, 72)',
            borderColor: 'rgb(67, 72, 72)',
            data: revenueData,
        },

        ]
    };
  
    const configRevenue = {
      type: 'line',
      data: dataRevenue,
      options: {}
    };

    const revenueChart = new Chart(
        document.getElementById('revenueChart'),
        configRevenue
    );

    // order number chart
    const dataOrder = {
      labels: labels,
      datasets: [
        {
            label: 'Fatturato anno corrente',
            backgroundColor: 'rgb(67, 72, 72)',
            borderColor: 'rgb(67, 72, 72)',
            data: revenueData,
        },

        ]
    };

    const configOrder = {
      type: 'bar',
      data: dataOrder,
      options: {}
    };

    const orderNumberChart = new Chart(
        document.getElementById('orderNumberChart'),
        configOrder
    );


</script>

@endsection