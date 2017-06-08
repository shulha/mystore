@extends('layout.main')

@section('content')
    @if(empty($orders))
        <p class="alert alert-danger">
            Sorry, there are nothing to display yet...
        </p>
    @else
        <div class="container">
            <h2>Ваш заказ принят!</h2>
            <table width=90%  align="center" border>
                <thead>
                <tr>
                    <th>Идентификатор</th>
                    <th>Изображение</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Итого</th>
                </tr>
                </thead>
                @foreach($orders as $order)
                    <tr>
                        <td align="center">{{$order->product_id}}</td>
                        <td align="center" ><img height=50 src="{{(explode(';', $order->items($order->product_id)->preview))[0]}}"></td>
                        <td align="center">{{$order->items($order->product_id)->title}}</td>
                        <td align="center">{{$order->price}}</td>
                        <td align="center">{{$order->amount}}</td>
                        <td align="center">{{$order->price*$order->amount}}
                    </tr>
                @endforeach
            </table>
            <h2>Общая сумма заказа: {{$total}}    </h2>
            <hr>
            @if ($orders)
                <h2>Информация о доставке</h2>
                Адресс:{{$orders[0]->address}}<br>
                Имя: {{$orders[0]->name}}<br>
                Телефон: {{$orders[0]->phone}}<br>
            @endif
        </div>
    @endif
@endsection