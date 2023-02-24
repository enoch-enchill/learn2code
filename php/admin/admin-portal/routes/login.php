<?php
RouteConfig::add('/admin/login',function(){
    include("admin-portal/views/login.php");
});
RouteConfig::add('/admin/login\/',function(){
    include("admin-portal/views/login.php");
});

RouteConfig::add('/admin/set-user-session',function(){
    $data = [
        "id" => $_POST['id'],
        "name" => $_POST['name'],
        "phone" => $_POST['phone']
    ];
    SessionConfig::set_user($data);
    header('Location: /admin/home');
}, 'post');

RouteConfig::add('/admin/logout',function(){    
    SessionConfig::kill();
    header('Location: /admin/login');
});
RouteConfig::add('/admin/logout\/',function(){    
    SessionConfig::kill();
    header('Location: /admin/login');
});


RouteConfig::add('/register',function(){  
    include("admin-portal/views/register.php");
});
RouteConfig::add('/register\/',function(){  
    include("admin-portal/views/register.php");
});

/* ------ Create New User -------------- */
RouteConfig::add('/admin/set_user_joejo',function(){
    $data = [
        "name" => 'Joejo',
        "email" => 'et.enchill@gmail.com',
        "phone" => '+233265006096',
        "password" => 'jET@7Ench!ll'
    ];
    $user = (object)ServicesConfig::post('users/create', $data );
    var_dump($user);
});
RouteConfig::add('/admin/set_user_augustine',function(){
    $data = [
        "name" => 'Augustine',
        "email" => 'abotsia@gmail.com',
        "phone" => '+14692545455',
        "password" => '&fPB96=3'
    ];
    $user = (object)ServicesConfig::post('users/create', $data );
    var_dump($user);
});
RouteConfig::add('/admin/set_user_emmanuel',function(){
    $data = [
        "name" => 'Emmanuel',
        "email" => 'iribat@gmail.com',
        "phone" => '+17013066666',
        "password" => 'nC>?7WR.'
    ];
    $user = (object)ServicesConfig::post('users/create', $data );
    var_dump($user);
});
 /**/