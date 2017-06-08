@extends('layout.main')

@section('content')
<div class="container">
    <h2>Заказ</h2>
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
                <td align="center">{{$order->price*$order->amount}}</td>
            </tr>
        @endforeach
    </table>
    <hr>
    <h2>Информация о доставке</h2>
    Адресс:{{$orders[0]->address}}<br>
    Имя: {{$orders[0]->name}}<br>
    Телефон: {{$orders[0]->phone}}<br>
</div>
@endsection