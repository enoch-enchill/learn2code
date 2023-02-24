<?php
# Images
RouteConfig::add('/admin/website/images',function(){
    if(SessionConfig::get_user()){
        include("admin-portal/views/website-images.php");
    }else{
        header('Location: /admin/login');
    }
});

# Sliders
RouteConfig::add('/admin/website/sliders',function(){
    if(SessionConfig::get_user()){
        include("admin-portal/views/website-sliders.php");
    }else{
        header('Location: /admin/login');
    }
});

# Menus
RouteConfig::add('/admin/website/menus',function(){
    
    if(SessionConfig::get_user()){
        include("admin-portal/views/website-menus.php");
    }else{
        header('Location: /admin/login');
    }
});

# Pages
RouteConfig::add('/admin/website/pages',function(){
    if(SessionConfig::get_user()){
        include("admin-portal/views/website-pages.php");
    }else{
        header('Location: /admin/login');
    }
});

# Contents
RouteConfig::add('/admin/website/contents',function(){
    if(SessionConfig::get_user()){
        include("admin-portal/views/website-contents.php");
    }else{
        header('Location: /admin/login');
    }
});

# Contents - Add
RouteConfig::add('/admin/website/contents-add',function(){
    if(SessionConfig::get_user()){
        include("admin-portal/views/website-contents-add.php");
    }else{
        header('Location: /admin/login');
    }
});

# Contents - Edit
RouteConfig::add('/admin/website/contents-edit/([0-9]*)',function($id){
    if(SessionConfig::get_user()){
        $page = [
            "id" => $id
        ];
        SessionConfig::set_page($page);
        include("admin-portal/views/website-contents-edit.php");
    }else{
        header('Location: /admin/login');
    }
});
