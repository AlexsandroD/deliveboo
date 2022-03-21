@extends('layouts.app')

@section('content')

<div class="container">
    <canvas id="revenueChart" class="mb-5"></canvas>
    <canvas id="orderNumberChart" class="mb-5"></canvas>
    <canvas id="dishesRankChart" class="mb-5"></canvas>
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

    let checkPush = false;

    // ////////////////////////
    //      revenue chart   //
    // //////////////////////
    let revenueOrders = {!! json_encode($ordersRevenue) !!};

    let revenueData = [];

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
                backgroundColor: '#00CCBC',
                borderColor: '#00CCBC',
                data: revenueData,
            },
        ]
    };
  
    const configRevenue = {
        type: 'line',
        data: dataRevenue,
        options: {},
        responsive: true,
    };

    const revenueChart = new Chart(
        document.getElementById('revenueChart'),
        configRevenue
    );


    // /////////////////////////////
    //      order number chart   //
    // ///////////////////////////
    let countOrders = {!! json_encode($ordersCount) !!};

    let ordersCountData = [];

    for(let i = 1; i < 13; i++) {

        checkPush = false;

        countOrders.forEach(order => {
            if (order.month == i) {
                ordersCountData.push(order.orderTotal);
                checkPush = true;
            }
        });

        if (!checkPush) {
            ordersCountData.push(0);
        }

    }

    const dataOrder = {
        labels: labels,
        datasets: [
            {
                label: 'Numero ordini anno corrente',
                backgroundColor: '#D0EB99',
                borderColor: '#D0EB99',
                data: ordersCountData,
            },

        ]
    };

    const configOrder = {
      type: 'bar',
      data: dataOrder,
      options: {},
      responsive: true,
    };

    const orderNumberChart = new Chart(
        document.getElementById('orderNumberChart'),
        configOrder
    );


    // ////////////////////////////
    //      dishes rank chart   //
    // //////////////////////////
    let dishesRank = {!! json_encode($dishesRank) !!};

    let dishesRankLabels = [];
    let dishesRankData = [];

    dishesRank.forEach(dish => {
        if (dish.deleted) {
            dishesRankLabels.push('(Cancellato) ' + dish.name);
        } else {
            dishesRankLabels.push(dish.name);
        }

        dishesRankData.push(dish.total);
    });

    dishesRankLabels.forEach((label, index) => {
        if (label.length > 30) {
            dishesRankLabels[index] = (label.slice(0,30) + '...')
        }
    });

    const dataDish = {
        labels: dishesRankLabels,
        datasets: [
            {
                label: 'Classifica piatti',
                backgroundColor: '#D0EB99',
                borderColor: '#D0EB99',
                data: dishesRankData,
            },
        ]
    };

    const configDish = {
        type: 'bar',
        data: dataDish,
        options: {
            indexAxis: 'y',
        },
        responsive: true,
    };

    const dishesRankChart = new Chart(
        document.getElementById('dishesRankChart'),
        configDish
    );


</script>

@endsection