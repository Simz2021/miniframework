<?php

//require_once 'app/config.php';
require_once __DIR__ . '/mvc.php';

//require_once ('mvc.php');

// Create an instance of the MiniFramework
$app = new Mvc();

// Define routes
$app->get('/', 'HomeController@index');
$app->post('/add-item', 'ItemController@addItem');
$app->post('/delete-item', 'ItemController@deleteItem');
$app->post('/edit-item', 'ItemController@editItem');
$app->get('/get-items', 'ItemController@getItems');
$app->get('/test', 'HomeController@test');
// Run the application
$app->run();

/*
require_once __DIR__.'/router.php';
$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/test', 'ItemController@test');

// Simulate the request handling
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestPath = $_SERVER['REQUEST_URI'];

$router->handleRequest($requestMethod, $requestPath);
*/