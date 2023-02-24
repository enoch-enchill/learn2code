<?php
// Pages - All
RouteConfig::add('/api/pages', function(){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data    
    PagesController::index();
});
// Pages - Live
RouteConfig::add('/api/page-live/([0-9]*)',function($id){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data    
    PagesController::live($id);
});
// Pages - Create
RouteConfig::add('/api/pages', function(){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data    
    PagesController::create();
}, 'post');

// Pages - Get By Id
RouteConfig::add('/api/pages/([0-9]*)',function($id){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data    
    PagesController::find($id);
});

// Pages - Get By Id
RouteConfig::add('/api/pages/([0-9]*)/update',function($id){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data    
    PagesController::update($id);
}, 'post');

// Pages - Get By Id
RouteConfig::add('/api/pages/([0-9]*)/delete',function($id){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data    
    PagesController::delete($id);
}, 'post');