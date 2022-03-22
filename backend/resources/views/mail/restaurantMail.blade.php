<h1>Ordine confermato</h1>

<p>Ciao {{$data['restaurantName']}}, hai ricevuto un nuovo ordine!</p>
<p>Di seguito il riepilogo dell'ordine:</p>

<ul>
    @foreach ($data['cart'] as $dish)
        <li>
            @php
                $dishDecode = json_decode($dish, true);
            @endphp
            <p>{{$dishDecode['name']}} x {{$dishDecode['quantity']}}</p>
        </li>
    @endforeach
</ul>

<p>Totale ordine: {{$data['totalPrice']}}</p>

<a href="{{route('orders.show', $orderId)}}">Visualizza l'ordine</a>