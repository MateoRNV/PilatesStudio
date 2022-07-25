<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Http\Server\RequestHandlerInterface;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->safeLoad();

$routes = require __DIR__ . '/../config/routes.php';
$path = $_SERVER['PATH_INFO'] ?? '/';

if (!array_key_exists($path, $routes)) {
    http_response_code(404);
    exit();
}

session_start();

$isLoginPath = stripos($path, 'login');
if (!isset($_SESSION['logged']) && $isLoginPath === false) {
    header('Location: /login');
    exit();
}

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$serverRequest = $creator->fromGlobals();

$classController = $routes[$path];

/** @var RequestHandlerInterface $controller */
$controller = new $classController();
$response = $controller->handle($serverRequest);

$headers = $response->getHeaders();
foreach ($headers as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();
