@extends('layout.main')

@section('content')
<h1>Добавить товар</h1>
<hr>
<form method="POST" enctype="multipart/form-data" action="{{route('store_product')}}">
    <div class="row">
        <div class="col-md-4">
            <input type="file" name="preview[]"/><br>
        </div>
        <div class="col-md-8">
            <i class="glyphicon glyphicon-arrow-left"></i> Выберите миниатюру для товара. <p class="help-block">
                Размер изображения 150x150px, не более 200Кб</p>
        </div>
    </div>
    <hr>
    <h3>Дополнительные изображения</h3>
    <button class="btn btn-primary add_images" type="button"><i class="glyphicon glyphicon-plus"></i></button>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <p><select size="1" name="category_id">
                    <option selected value="0">Выберите категорию</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>&#160;
                <input type="checkbox" name="selected"><span> Возможно купить из категории ?</span><br></p>
            <label class="control-label" for="article">Артикул товара</label>
            <input class="form-control" type="text" name="article"/>
            <label class="control-label" for="name">Название товара</label>
            <input class="form-control" type="text" name="title"/>
            <label class="control-label" for="description">Описание товара</label>
            <textarea class="form-control" rows="4" name="description"></textarea>
            <label class="control-label" for="price">Цена</label>
            <input class="form-control" type="text" name="price"/>
            <label class="control-label" for="amount">Количество</label>
            <input class="form-control" type="number" min="1" value="1" name="amount"/>
        </div>
    </div>
    <h3>Параметры товара</h3>
    <hr>
    <button class="btn btn-primary btn-lg add_button" type="button">Добавить</button>
    <hr>
    <input type="hidden" name="token" value="{{csrf_token()}}"/>
    <button class="btn btn-default btn-lg save_item" type="submit">Сохранить товар</button>
</form>
@endsection