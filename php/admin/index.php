<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);

// Start the session
session_start();

/* -----------------------------------------
        CLASSES AUTO LOADER
---------------------------------------------*/
spl_autoload_register(function ($class_name) {
    // Configs
    if (strpos($class_name, 'Config') !== false) {
        include 'api-services/configs/' . $class_name . '.php';
    }
    // Models
    if (strpos($class_name, 'Model') !== false) {
        include 'api-services/models/' . $class_name . '.php';
    }
    // Repositories
    if (strpos($class_name, 'Repository') !== false) {
        include 'api-services/repositories/' . $class_name . '.php';
    }
    // Controllers
    if (strpos($class_name, 'Controller') !== false) {
        include 'api-services/controllers/' . $class_name . '.php';
    }    
});


/* ------------------------------------
            ROUTE WEBSITE
---------------------------------------*/
# Home
RouteConfig::add('/',function(){
    include("soon.php");   
});
# About
RouteConfig::add('/about-us',function(){
    include("about.php");
});
# Our Identity
RouteConfig::add('/our-identity',function(){
    include("our-identity.php");
});
# 404
RouteConfig::pathNotFound(function(){    
    include("admin-portal/views/404.php");
});

/* -----------------------------------
            ROUTE ADMIN
--------------------------------------*/
include("admin-portal/routes/home.php");
include("admin-portal/routes/login.php");
include("admin-portal/routes/website.php");

/* -----------------------------------
            ROUTE API
--------------------------------------*/
include("api-services/routes/home.php");
include("api-services/routes/users.php");
include("api-services/routes/menus.php");
include("api-services/routes/pages.php");
include("api-services/routes/contents.php");

// Run RouteConfig
RouteConfig::run();