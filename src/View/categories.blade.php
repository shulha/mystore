@extends('layout.main')

@section('contentCatalog')

    @if(!empty($categories))
        <div class="row">
    <div class="container">
        <form method="post" action="/search" class="pull-right control-group">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Go!</button>
                </span>
            </div><!-- /input-group -->
        </form>
    </div><!-- /.col-lg-6 -->
        </div>
    <div class="row" data-columns>
        @foreach($categories as $category)
            <div class="col-sm-4" style="margin-bottom:20px;">
            <a href="/category/{{$category->url}}"  class="thumbnail1 text-center" style="display:block;">
					<span style="width:200px; height:200px; overflow:hidden; margin:0 auto; display: inline-block; vertical-align: middle;">
                        @if($category->preview)
						    <img style="vertical-align: middle; max-height: 200px; display:inline;" src={{$category->preview}} title={{$category->name}}/>
                        @else
						    <img style="vertical-align: middle; max-height: 200px; display:inline;" src="http://placehold.it/200x200" title={{$category->name}}/>
                        @endif
					</span>
                <span style="height:38px; display:block;"><h3>{{$category->name}}</h3></span>
            </a>
            </div>
        @endforeach
    </div>
    @else
    <p class="alert alert-danger">
        Sorry, there are nothing to display yet...
    </p>
    @endif

@stop