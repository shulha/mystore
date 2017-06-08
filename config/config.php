<?php

return [
    "db" => [
        'driver' => 'pgsql',
        'host'   => 'localhost',
        'database' => 'store',
        'username'   => 'postgres',
        'password' => '321',
        'charset'  => 'utf8',
        'schema'   => 'public',
    ],
    "login" => '/login',
    "path_to_views" => realpath(dirname(__FILE__) . "/../src/View"),
    "services" => include('services.php'),
    "router" => [
        'config' => include('routes.php')
    ]
];
