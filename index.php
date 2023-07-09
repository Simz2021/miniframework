<?php

require_once __DIR__ . '/mvc.php';


// Create an instance of the MiniFramework
$app = new Mvc();

// Define routes
$app->get('/', 'HomeController@index');
$app->get('/test', 'HomeController@testnow');
$app->get('/zone', 'HomeController@zonepage');
$app->get('/new','ItemController@test');
$app->get('/get-items', 'ItemController@getItems');
$app->post('/add-item', 'ItemController@addItem');
$app->run();