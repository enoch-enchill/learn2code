<?php

// Start the session
session_start();

// Include classes
include('config/Route.php');
include('config/Session.php');
include('config/Services.php');

Route::add('/',function(){
    if(Session::get()){
        include("views/home.php");
    }else{
        header('Location: /login');
    }    
});

Route::add('/login',function(){    
    include("views/login.php");
});

Route::add('/logout',function(){    
    Session::kill();
    header('Location: /login');
});

Route::add('/login',function(){
    $data = [
        "email" => $_POST['email'],
        "password" => $_POST['password']
    ];
    $result = (object)Services::post('users/login', $data);
    
    if($result != null && $result->body){
        Session::set($result->body);
        header('Location: /');
    }else{
        include("views/login.php");
    }
}, 'post');


Route::add('/set_user_text_msg_info',function(){
    $data = [
        "name" => 'Joejo',
        "email" => 'et.enchill@gmail.com',
        "phone" => '+233265006096',
        "password" => 'jET@7Ench!ll'
    ];
    $user = (object)Services::post('users/create', $data );
    print_r($user);
});

Route::pathNotFound(function(){    
    include("views/404.php");
});

// Run Route
Route::run();