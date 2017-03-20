<?php

return [
//    "routes" => include('routes.php'),
    "path_to_views" => dirname(__FILE__, 2) . '/src/views',
    "router" => [
        'config' => include('routes.php')
    ],
//    "views" => realpath(dirname(__FILE__) . "/../views"),
    "db" => [
        'host' => 'localhost',
        'db' => 'myapp',
        'user' => 'root',
        'password' => ''
    ],
    "services" => include('services.php'),
    "middlewares" => [
        'age' => 'Mystore\\Middlewares\\AgeMiddleware',
        'admin' => 'Mystore\\Middlewares\\IsAdminMiddleware',
        'first' => 'Mystore\\Middlewares\\FirstMiddleware',
        'second' => 'Mystore\\Middlewares\\SecondMiddleware',
        'third' => 'Mystore\\Middlewares\\ThirdMiddleware',
    ],
];