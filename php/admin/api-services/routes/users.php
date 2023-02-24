<?php

// Users - All
RouteConfig::add('/api/users', function(){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data
    UsersController::index();
});

// Users - Create
RouteConfig::add('/api/users/create', function(){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data
    UsersController::create();
}, 'post');

// Users - Login
RouteConfig::add('/api/users/login', function(){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data
    UsersController::login();
}, 'post');