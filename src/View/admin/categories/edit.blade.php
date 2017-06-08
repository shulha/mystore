@extends('layout.main')

@section('content')
    <form method="POST" enctype="multipart/form-data" action="/adminzone/categories/edit/{{$category->id}}">
        <input type="hidden" id="item_id" value="{{$category->id}}"/>
        <div class="row">
        @if(!empty($category->preview))
                <div class="img-thumbnail">
                    <img width=100 src="{{$category->preview}}">
                    <button type="button" title="Удалить" class="btn btn-danger del_image_category btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                </div>
            @endif
        </div>
        <hr>
        <h3>Добавить изображения</h3>
        <div class="row">
            <div class="col-md-4">
                <input type="file" name="preview[]"/><br>
            </div>
            <div class="col-md-8">
                <i class="glyphicon glyphicon-arrow-left"></i> Выберите миниатюру для категории.
                <p class="help-block">Размер изображения 200x200px</p>
            </div>
        </div>
        <hr>
    Название категории<br>
    <p><input type="text" name="name" placeholder="{{$category->name}}"/></p>
    Родительская категория<br>
    <p><select size="1" name="parent_id">
            <option disabled>Выберите родительскую категорию</option>
            @if($parent->id)
                <option selected value={{$parent->id}}>{{$parent->name}}</option>
            @endif
            <option value="0">Нет категории</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select></p>
    <p><input type="submit" value="Сохранить"></p>
    </form>
@endsection