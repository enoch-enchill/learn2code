<?php
// Menus - All
RouteConfig::add('/api/menus', function(){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data    
    MenusController::index();
});
// Menus - With Pages
RouteConfig::add('/api/menus-pages', function(){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data    
    MenusController::pages();
});
// Menus - Live
RouteConfig::add('/api/menus-live',function(){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data    
    MenusController::live();
});
// Menus - Create
RouteConfig::add('/api/menus', function(){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data    
    MenusController::create();
}, 'post');

// Menus - Get By Id
RouteConfig::add('/api/menus/([0-9]*)',function($id){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data
    MenusController::find($id);
});

// Menus - Get By Id
RouteConfig::add('/api/menus/([0-9]*)/update',function($id){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data
    MenusController::update($id);
}, 'post');

// Menus - Get By Id
RouteConfig::add('/api/menus/([0-9]*)/delete',function($id){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data
    MenusController::delete($id);
}, 'post');