<?php

use App\Router\Router;

// Create a new router instance
$router = new Router();

$router->add('GET', '/', function () {
    return json_encode(['message' => 'Welcome']);
});

// Define a GET route for the users list
$router->add('GET', '/users', function () {
    return json_encode(['message' => 'Fetching all users']);
});

// Define a GET route for fetching a single user by ID
$router->add('GET', '/users/{id}', function ($id) {
    return json_encode(['message' => "Fetching user with ID: $id"]);
});

// Define a POST route for creating a new user
$router->add('POST', '/users', function () {
    return json_encode(['message' => 'Creating a new user']);
});

// Define a PUT route for updating a user
$router->add('PUT', '/users/{id}', function ($id) {
    return json_encode(['message' => "Updating user with ID: $id"]);
});

// Define a DELETE route for deleting a user
$router->add('DELETE', '/users/{id}', function ($id) {
    return json_encode(['message' => "Deleting user with ID: $id"]);
});

// Return the router instance
return $router;
