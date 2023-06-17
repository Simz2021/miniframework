<?php

//require_once 'app/config.php';
require_once ('mvc.php');

// Create an instance of the MiniFramework
$app = new Mvc();

// Define routes
$app->get('/', 'HomeController@index');
$app->post('/add-item', 'ItemController@addItem');
$app->post('/delete-item', 'ItemController@deleteItem');
$app->post('/edit-item', 'ItemController@editItem');

// Run the application
$app->run();