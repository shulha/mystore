@extends('layout.main')

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th hidden>id</th>
            <th>Категории</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td hidden>{{$category->id}}</td>
                <th ><a href=/adminzone/categories/edit/{{$category->id}}>{{$category->name}}</a></th>
                <td><span class="del_category">Удалить</span></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
