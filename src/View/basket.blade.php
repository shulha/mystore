@extends('layout.main')

@section('content')
<div class="container">
    <div class="row">
        @if(empty(reset($orders)))
            <h2>Ничего не выбрано</h2>
        @else
            <h2>Ваш заказ</h2>
            <table width=100% class="table-responsive table-striped">
                <thead>
                <tr>
                    <th>Идентификатор</th>
                    <th>Изображение</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Итого</th>
                    <th>Действие</th>
                </tr>
                </thead>
                @foreach($orders as $total => $value)
                    @foreach($value as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td><img height=50 src="{{$order->preview}}"></td>
                        <td>{{$order->title}}</td>
                        <td>{{$order->price}}</td>
                        <td><input class="total" type="text" value="{{$order->amount}}"/>
                            <button type="button" class="btn btn-default plus">+</button>
                            <button type="button" class="btn btn-default minus">-</button></td>
                        <td class="price_order">{{$order->price*$order->amount}}
                        <td><button type="button" class="btn btn-danger del_order">Удалить</button></td>
                    </tr>
                @endforeach
            </table>
            <p>Итого к оплате: <span style="font-size: 2em;" class="total_cost">{{$total}}</span> USD</p>
            @endforeach
            <hr>
            <h2>Информация о доставке</h2>
            <form method="POST" action="/checkout">
                <label for="name">Ваше имя</label><br>
                <input class="form-control" type="text" name="name"/><br>
                <label  for="address">Адрес доставки</label><br>
                <textarea class="form-control" rows="4" name="address"></textarea><br>
                <label for="phone">Телефон</label><br>
                <input class="form-control" type="text" name="phone"/><br>
                <button type="submit" class="btn btn-primary btn-lg">Заказать</button>
            </form>
        @endif
    </div>
</div>
@endsection