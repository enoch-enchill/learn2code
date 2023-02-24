<?php
RouteConfig::add('/admin\/',function(){
    if(SessionConfig::get_user()){
        include("admin-portal/views/home.php");
    }else{
        header('Location: /admin/login');
    }
});

RouteConfig::add('/admin',function(){
    if(SessionConfig::get_user()){
        include("admin-portal/views/home.php");
    }else{
        header('Location: /admin/login');
    }
});

RouteConfig::add('/admin/home',function(){       
    if(SessionConfig::get_user()){
        include("admin-portal/views/home.php");
    }else{
        header('Location: /admin/login');
    }    
});
RouteConfig::add('/admin/home\/',function(){       
    if(SessionConfig::get_user()){
        include("admin-portal/views/home.php");
    }else{
        header('Location: /admin/login');
    }    
});
