@extends('layout.main')

@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{route('store_category')}}">
        <div class="row">
            <div class="col-md-4">
                <input type="file" name="preview[]"/><br>
            </div>
            <div class="col-md-8">
                <i class="glyphicon glyphicon-arrow-left"></i> Выберите миниатюру для категории.
                <p class="help-block">Размер изображения 200x200px</p>
            </div>
        </div>
        Название категории<br>
        <p><input type="text" name="name"/></p>
        Родительская категория<br>
        <p><select size="1" name="parent_id">
            <option disabled>Выберите родительскую категорию</option>
            <option selected value="0">Нет категории</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
        </select></p>
        <input type="hidden" name="token" value="{{csrf_token()}}"/>
        <p><input type="submit" value="Сохранить"></p>
    </form>
@endsection