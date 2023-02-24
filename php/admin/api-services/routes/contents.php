<?php
// Contents - All
RouteConfig::add('/api/contents', function(){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data    
    ContentsController::index();
});
// Contents - Active
RouteConfig::add('/api/contents/active',function(){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data    
    ContentsController::active();
});
// Contents - Create
RouteConfig::add('/api/contents', function(){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data    
    ContentsController::create();
}, 'post');

// Contents - Get By Id
RouteConfig::add('/api/contents/([0-9]*)',function($id){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data
    ContentsController::find($id);
});

// Contents - Get By Id
RouteConfig::add('/api/contents/([0-9]*)/update',function($id){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data
    ContentsController::update($id);
}, 'post');

// Contents - Get By Id
RouteConfig::add('/api/contents/([0-9]*)/delete',function($id){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data
    ContentsController::delete($id);
}, 'post');