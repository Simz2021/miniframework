<?php

require_once __DIR__ . '/../myMVC/controllers/ItemController.php';

$route = $_GET['route'] ?? '/';

switch ($route) {
    case '/':
        $controller = new ItemController();
        $controller->index();
        break;
    case '/item/add':
        $controller = new ItemController();
        $controller->add();
        break;
    case '/item/delete':
        $controller = new ItemController();
        $controller->delete();
        break;
    case '/item/edit':
        $controller = new ItemController();
        $controller->edit();
        break;
    default:
        http_response_code(404);
        echo 'yest 404 Not Found';
        break;
}


spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../myMVC/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
