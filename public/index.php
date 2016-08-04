<?php

require_once __DIR__.'/../vendor/autoload.php';

chdir(__DIR__.'/..');

$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';

$base_uri = getenv('BASE_URI');

$base_uri_len = strlen($base_uri);

if ($base_uri_len and substr($uri, 0, $base_uri_len) == $base_uri) {
	$uri = substr($uri, $base_uri_len);
}

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $routes) {
	$routes->addRoute(['GET', 'POST'], '/login', 'Controller\\LoginController->login');
	$routes->addRoute('GET', '/', 'Controller\\HomeController->index');
	$routes->addRoute('GET', '/hello', 'Controller\\HelloController->hello');
	$routes->addRoute('POST', '/logout', 'Controller\\LogoutController->logout'); // Sao phai de method la POST
	$routes->addRoute(['GET', 'POST'], '/register', 'Controller\\RegisterController->register');
});

$routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
    	die('404 Not Found');
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        die('405 Method Not Allowed');
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars    = $routeInfo[2];

        $handler = explode('->', $handler);
        if (count($handler) != 2) {
        	die('404 Not Found');
        }

        $controller = new $handler[0];
        $method = $handler[1];

        call_user_func_array([$controller, $method], $vars);

        break;
}
