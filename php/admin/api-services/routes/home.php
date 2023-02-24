<?php
RouteConfig::add('/api\/',function(){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data
    $data = [
        "name" => "APSU USA API"
    ];        
    echo json_encode($data); 
});
RouteConfig::add('/api/home',function(){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data
    $data = [
        "name" => "APSU USA API"
    ];        
    echo json_encode($data); 
});

RouteConfig::add('/api/mail-list',function(){
    // Set JSON Header   
    header('Content-Type: application/json');
    // Process Data
    $data = [
        "name" => "APSU USA API"
    ];        
    echo json_encode($data); 
});