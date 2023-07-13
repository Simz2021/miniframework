<?php

require_once __DIR__ . '/mvc.php';


// Create an instance of the MiniFramework
$app = new Mvc();

// Define routes
$app->get('/', 'ItemController@index');
$app->get('/get-items', 'ItemController@getItems');
$app->post('/add-item', 'ItemController@addItem');
$app->post('/item/delete', 'ItemController@delete');
$app->post('/item/edit','ItemController@edit');
$app->run();