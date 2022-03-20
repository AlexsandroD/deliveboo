<h1>Ordine confermato</h1>

<p>Ciao {{$data['name']}} {{$data['surname']}}, il tuo ordine presso {{$data['restaurantName']}} è stato confermato.</p>
<p>Di seguito il riepilogo dell'ordine:</p>

<ul>
    @foreach ($data['cart'] as $dish)
        <li>
            @php
                $dishDecode = json_decode($dish, true);
            @endphp
            <p>{{$dishDecode['name']}} X {{$dishDecode['quantity']}}</p>
        </li>
    @endforeach
</ul>

<p>Totale ordine: {{$data['totalPrice']}}</p>