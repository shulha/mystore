<?php

return [
    "root" => [
        "pattern" => "/",
        "method" => "GET",
        "action" => "Mystore\\IndexController@index",
        "middlewares" => ['admin', 'age'],
    ],
    "product_list" =>
        [
            "pattern" => "/product",
            "method" => "GET",
            "action" => "Mystore\\ProductController@getAllGoods",
            "middlewares" => ['age', 'admin', 'first', 'second', 'third'],
        ],
    "single_product" => [
        "pattern" => "/product/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\IndexController@getProduct"
    ],
    "create_product" => [
        "pattern" => "/product",
        "method" => "POST",
        "action" => "Mystore\\IndexController@createProduct"
    ]
];
