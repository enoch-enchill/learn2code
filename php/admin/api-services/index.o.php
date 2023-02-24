<?php

// Set JSON Header   
header('Content-Type: application/json');

// Include router class
include('config/Route.php');

/* -----------------------------------------
             CLASS AUTO LOADER
---------------------------------------------*/
spl_autoload_register(function ($class_name) {
    // Models
    if (strpos($class_name, 'Model') !== false) {
        include 'models/' . $class_name . '.php';
    }
    // Repositories
    if (strpos($class_name, 'Repository') !== false) {
        include 'repositories/' . $class_name . '.php';
    }
    // Controllers
    if (strpos($class_name, 'Controller') !== false) {
        include 'controllers/' . $class_name . '.php';
    }    
});


/* -----------------------------------------
                INDEX PAGE
---------------------------------------------*/
Route::add('/',function(){
    $data = [
        "name" => "APSU USA API"
    ];
    echo json_encode($data); 
});
// Users - All
Route::add('/users', function(){    
    $users = new UsersController();
    $users->index();
});

// Users - Create
Route::add('/users/create', function(){    
    $users = new UsersController();
    $users->create();
}, 'post');


// Users - Login
Route::add('/users/login', function(){    
    $users = new UsersController();
    $users->login();
}, 'post');

/* -----------------------------------------
                MENU ACTIONS
---------------------------------------------*/
// Menus - All
Route::add('/menus', function(){    
    $menus = new MenusController();
    $menus->index();
});

// Menus - Active
Route::add('/menus/active',function(){    
    $menus = new MenusController();
    $menus::active();
});

// Menus - Create
Route::add('/menus', function(){    
    $menus = new MenusController();
    $menus::create($_POST);
}, 'post');

// Menus - Get By Id
Route::add('/menus/([0-9]*)',function($id){    
    $menus  = new MenusController();
    $menus::find($id);
});

// Menus - Get By Id
Route::add('/menus/([0-9]*)/update',function($id){    
    $menus  = new MenusController();
    $menus::update($id, $_POST);
}, 'post');

// Menus - Get By Id
Route::add('/menus/([0-9]*)/delete',function($id){    
    $menus  = new MenusController();
    $menus::delete($id);
});


// Run Route
Route::run();