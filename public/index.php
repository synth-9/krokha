<?php

// Load Composer's autoloader
require __DIR__ . '/../vendor/autoload.php';


$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        // Handle the main entry point or root route
        echo "Welcome to Krokha!";
        break;

    case '/api':
        // Example of an API route
        echo "API endpoint!";
        break;

    default:
        // Handle 404 Not Found
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
        break;
}
