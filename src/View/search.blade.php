@extends('layout.main')

@section('content')
    @if(!empty($results))
        <div class="container">
        <table class="table">
            <tr>
                <th>Товар</th>
                <th>Описание</th>
                <th>Цена</th>
            </tr>
            @foreach($results as $result)
                <tr>
                    <td><a href="/product/show/{{$result->id}}">{{$result->title}}</a></td>
                    <td>{{$result->description}}</td>
                    <td>{{$result->price}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    @else
        <p class="alert alert-danger">
            Sorry, there are nothing to display yet...
        </p>
    @endif
@endsection