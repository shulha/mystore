<?php

return [
    "root" => [
        "pattern" => "/",
        "method" => "GET",
        "action" => "Mystore\\Controller\\PageController@index",
    ],
    "contact" => [
        "pattern" => "/contact",
        "method" => "GET",
        "action" => "Mystore\\Controller\\PageController@contact",
    ],
    "auth" => [
        "pattern" => "/signin",
        "method" => "POST",
        "action" => "Shulha\\Framework\\Controller\\AuthController@signin"
    ],
    "login" => [
        "pattern" => "/login",
        "method" => "GET",
        "action" => "Shulha\\Framework\\Controller\\AuthController@login"
    ],
    "logout" => [
        "pattern" => "/logout",
        "method" => "GET",
        "action" => "Shulha\\Framework\\Controller\\AuthController@logout"
    ],
    "registration" => [
        "pattern" => "/registration",
        "method" => "GET",
        "action" => "Mystore\\Controller\\UserController@create"
    ],
    "user" => [
        "pattern" => "/user",
        "method" => "GET",
        "action" => "Mystore\\Controller\\UserController@index"
    ],
    "save_user" => [
        "pattern" => "/submit",
        "method" => "POST",
        "action" => "Mystore\\Controller\\UserController@store"
    ],
//-------------------------------------------------------------------------------
    "catalog" => [
        "pattern" => "/category",
        "method" => "GET",
        "action" => "Mystore\\Controller\\CategoriesController@index"
    ],
    "category" => [
        "pattern" => "/category/{slug}",
        "method" => "GET",
        "variables" => [
            "slug"
        ],
        "action" => "Mystore\\Controller\\CategoriesController@menu"
    ],
    "all_categories" => [
        "pattern" => "/adminzone/categories",
        "method" => "GET",
        "action" => "Mystore\\Controller\\CategoriesController@allmenu",
        "middlewares" => ['check_role:ADMIN'],

    ],
    "store_category" => [
        "pattern" => "/adminzone/categories",
        "method" => "POST",
        "action" => "Mystore\\Controller\\CategoriesController@store",
        "middlewares" => ['check_role:ADMIN'],
    ],
    "create_category" => [
        "pattern" => "/adminzone/categories/create",
        "method" => "GET",
        "action" => "Mystore\\Controller\\CategoriesController@create",
        "middlewares" => ['check_role:ADMIN'],
    ],
    "destroy_category" => [
        "pattern" => "/adminzone/categories/{id}",
        "method" => "DELETE",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\CategoriesController@destroy",
        "middlewares" => ['check_role:ADMIN'],
    ],
    "edit_category" => [
        "pattern" => "/adminzone/categories/edit/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\CategoriesController@edit",
        "middlewares" => ['check_role:ADMIN'],
    ],
    "del_image_category" => [
        "pattern" => "/adminzone/category/del_image_category",
        "method" => "POST",
        "action" => "Mystore\\Controller\\CategoriesController@del_image_category",
        "middlewares" => ['check_role:ADMIN'],
    ],
    "update_category" => [
        "pattern" => "/adminzone/categories/edit/{id}",
        "method" => "POST",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\CategoriesController@update",
        "middlewares" => ['check_role:ADMIN'],
    ],
//-------------------------------------------------------------------------------
    "product_search" => [
        "pattern" => "/search",
        "method" => "POST",
        "action" => "Mystore\\Controller\\ProductController@search"
    ],
    "products_of_category" => [
        "pattern" => "/category/{slug}/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+",
            "slug"
        ],
        "action" => "Mystore\\Controller\\ProductController@index"
    ],
    "product_sorting" => [
        "pattern" => "/category/{slug}/{id}",
        "method" => "POST",
        "variables" => [
            "id" => "\d+",
            "slug"
        ],
        "action" => "Mystore\\Controller\\ProductController@index"
    ],
    "product_next" => [
        "pattern" => "/category/{slug}/{id}/{limit}",
        "method" => "POST",
        "variables" => [
            "id" => "\d+",
            "slug",
            "limit" => "\d+"
        ],
        "action" => "Mystore\\Controller\\ProductController@next"
    ],
    "product" => [
        "pattern" => "/product/show/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\ProductController@show"
    ],
    "create_product" => [
        "pattern" => "/adminzone/products/create",
        "method" => "GET",
        "action" => "Mystore\\Controller\\ProductController@create",
        "middlewares" => ['check_role:ADMIN'],
    ],
    "last_product" => [
        "pattern" => "/adminzone/products",
        "method" => "GET",
        "action" => "Mystore\\Controller\\ProductController@last",
        "middlewares" => ['check_role:ADMIN'],
    ],
    "store_product" => [
        "pattern" => "/adminzone/products",
        "method" => "POST",
        "action" => "Mystore\\Controller\\ProductController@store",
        "middlewares" => ['check_role:ADMIN'],
    ],
    "all_parameters" => [
        "pattern" => "/adminzone/products/parameters",
        "method" => "GET",
        "action" => "Mystore\\Controller\\ParametersController@show",
        "middlewares" => ['check_role:ADMIN'],
    ],
    "save_parameters" => [
        "pattern" => "/adminzone/products/parameters",
        "method" => "POST",
        "action" => "Mystore\\Controller\\ParametersController@save",
        "middlewares" => ['check_role:ADMIN'],
    ],
    "edit_product" => [
        "pattern" => "/adminzone/products/edit/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\ProductController@edit",
        "middlewares" => ['check_role:ADMIN'],
    ],
    "update_product" => [
        "pattern" => "/adminzone/products/edit/{id}",
        "method" => "POST",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\ProductController@update",
        "middlewares" => ['check_role:ADMIN'],
    ],
    "del_image" => [
        "pattern" => "/adminzone/products/del_image",
        "method" => "POST",
        "action" => "Mystore\\Controller\\ProductController@del_image",
        "middlewares" => ['check_role:ADMIN'],
    ],
    "destroy_product" => [
        "pattern" => "/adminzone/products/{id}",
        "method" => "DELETE",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\ProductController@destroy",
        "middlewares" => ['check_role:ADMIN'],
    ],
//-------------------------------------------------------------------------------
    "basket" => [
        "pattern" => "/basket",
        "method" => "GET",
        "action" => "Mystore\\Controller\\BasketController@index"
    ],
    "checkout" => [
        "pattern" => "/checkout",
        "method" => "POST",
        "action" => "Mystore\\Controller\\BasketController@checkout"
    ],
    "all_orders" => [
        "pattern" => "/adminzone/orders",
        "method" => "GET",
        "action" => "Mystore\\Controller\\OrderController@orders",
        "middlewares" => ['check_role:ADMIN'],
    ],
    "show_order" => [
        "pattern" => "/adminzone/orders/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\OrderController@show",
        "middlewares" => ['check_role:ADMIN'],
    ],
];
