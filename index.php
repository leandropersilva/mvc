<?php

$requestURI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = explode('/', $requestURI);

if (count($url) > 1) {
    $controller = ucfirst($url[1]);
    $method = $url[2] ?? 'index';

    $routeParams = (count($url) > 3) ? array_slice($url, 3) : [];
    $getParams = $_GET;

    $file = 'src/controller/' . $controller . '.php';

    if (file_exists($file)) {
        require_once $file;
        $class = new $controller();
        if (method_exists($class, $method)) {
            $class->$method(array_merge($routeParams, $getParams));
        } else {
            http_response_code(404);
            include 'src/view/404/method404.php';
        }
    } else {
        http_response_code(404);
        include 'src/view/404/controller404.php';
    }
}
