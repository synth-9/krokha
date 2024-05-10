<?php

// Load Composer's autoloader to handle dependencies and autoloading
require __DIR__ . '/../vendor/autoload.php';

// Load the routes configuration, where APIb routes are defined
$router = require __DIR__ . '/../routes/api.php';

// Dispatch the request to the appropriate route based on the URI and HTTP method
$response = $router->dispatch(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), $_SERVER['REQUEST_METHOD']);


// Output the response
echo $response;
