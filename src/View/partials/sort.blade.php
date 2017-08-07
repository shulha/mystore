<div class="row sorting">
    <div class="col-xs-6">
        <form method="post" action="/search" class="pull-left control-group">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search for...">
                <input type="hidden" class="form-control" name="slug" value={{$slug}}>
                <input type="hidden" class="form-control" name="id" value={{$id}}>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Go!</button>
                </span>
            </div><!-- /input-group -->
        </form>
    </div><!-- /.col-lg-6 -->

    <div class="col-xs-6">
    <form method="post" action="/category/{{$slug}}/" class="pull-right sort_short control-group">
        <small>сортировать по</small>
        <div class="btn-group btn-group-sm">
            <button type="submit" class="btn btn-default btn-effect " name="sort[updated_at]">дате</button>
            <button type="submit" class="btn btn-default btn-effect " name="sort[price]">цене</button>
            <button type="submit" class="btn btn-default btn-effect " name="sort[title]">имени</button>
        </div>
        <div class="btn-group btn-xs">
            <select id="direction" name="direction" class="">
                <option value="DESC" selected="selected">По убыванию</option>
                <option value="ASC" >По возрастанию</option>
            </select>
        </div>
        <div class="btn-group btn-xs">
            <select id="numpos_select" name="numpos" class="">
                <option value="12" selected="selected">12</option>
                <option value="24" >24</option>
                <option value="48" >48</option>
                <option value="96" >96</option>
                <option value="192" >192</option>
            </select>
        </div>
    </form>
    </div>
</div>