<?php

return [
//    "routes" => include('routes.php'),
    "path_to_views" => dirname(__FILE__, 2) . '/src/views',
    "router" => [
        'config' => include('routes.php')
    ],
    "db" => [
        'host' => 'localhost',
        'db' => 'myapp',
        'user' => 'root',
        'password' => ''
    ],
    "services" => include('services.php'),
    "middlewaresMap" => [
        'age' => 'Mystore\\Middlewares\\AgeMiddleware',
    ],
];