<?php

//phpinfo();
//exit;

$loader = require '../vendor/autoload.php';

$loader->addPsr4("Mystore\\", dirname(__FILE__).'/../src/');

$app = new \Shulha\Framework\Application( include(dirname(__FILE__) . '/../config/config.php') );

$app->run();
