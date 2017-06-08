@extends('layout.main')

@section('content')
    <h1>"{{$items->title}}"</h1>
    <hr>

    <div class="container">
    @if(!empty(reset($images)))
        <div class="row">
            <div class="col-md-12">
                @foreach($images as $image)
                    <img class="img-thumbnail" width=150 src="{{$image}}">
                @endforeach
            </div>
        </div>
    @endif
    <br>
        <div>
            Артикул: {{$items->article}}
        </div>
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">Описание</div>
        <div class="panel-body">
            {{$items->description}}
        </div>
    </div>
    @if($parameters)
        <h3>Параметры</h3>
        <table class="table table-striped">
            <thead>
            <th>Название</th>
            <th>Значение</th>
            </thead>
            <tbody>

            @foreach($parameters as $parameter => $values)
                <tr>
                    <td>{{$parameter}}</td>
                    <td>
                        @if(count($values)>1)
                            <select size="1" name="value">
                                @foreach($values as $k => $v)
                                        <option value="{{$k}}">{{$v}}</option>
                                @endforeach
                            </select>
                        @else
                            {{reset($values)}}
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    <h3>Доступно: {{$items->storage}} шт.</h3>
    <h2 class="text-success">Цена: {{$items->price}} USD</h2>
    <hr>
    <button class="btn btn-primary buy-btn" id="{{$items->id}}">Купить</button>

        {{--<a href="/cart-product/{{$items->id}}">В корзину</a>--}}

    </div>
@stop