<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">E-shop</a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                {{--<li><a href="/">Home</a></li>--}}
                <li><a href="{{route('contact')}}">Contact</a></li>
                <li><a href="{{route('catalog')}}">Catalog</a></li>
                {{--<li><a href="#about">About</a></li>--}}
                @if(hasAccess('ADMIN'))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">Товары</li>
                            <li><a href="{{route('last_product')}}">Последние добавленные</a></li>
                            <li><a href="{{route('create_product')}}">Добавить товар</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Категории</li>
                            <li><a href="{{route('all_categories')}}">Все категории</a></li>
                            <li><a href="{{route('create_category')}}">Добавить категорию</a></li>
                            {{--<li role="separator" class="divider"></li>--}}
                            {{--<li class="dropdown-header">Параметры</li>--}}
                            {{--<li><a href="{{route('all_parameters')}}">Все параметры</a></li>--}}
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Заказы</li>
                            <li><a href="{{route('all_orders')}}">Все заказы</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(checkAuth())
                    <li><a href="/user" class="glyphicon glyphicon-user"><?php getUser()->login; ?></a></li>
                    {{--<li><a href="{{route('logout')}}">Logout</a></li>--}}
                @else
                    <li><a href="<?php echo route('registration'); ?>">Registration</a></li>
                    <li><a href="{{route('login')}}">Login</a></li>
                @endif
                <li><a href="/basket" class=" navbar-link navbar-right ">
                    <span class="glyphicon glyphicon-shopping-cart basket" ></span>
                    <span class="badge pull-right count_order">0</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>