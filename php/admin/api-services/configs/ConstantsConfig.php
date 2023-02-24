<?php 
class ConstantsConfig {

    // Database Credentials
    public static function dbConn(){
        //new mysqli(host, user, pass, db);
        return new mysqli("localhost", "apsuusao_NTXAU", "TQ4CcxYHHT38i9F", "apsuusao_NTXAU");
    }

    // Session Names
    public static $user_session_id = "user_session";
    public static $page_session_id = "page_session";

    // WEB [Routes]
    public static $web_routes = [
        ["route" => "/", "path" => "home.php"]
    ];

    // API
    public static $api_base_url = "http://apsuusa.viz/api/";

    // Storage Bucket
    public static function storage_buckect() {
        return $_SERVER['DOCUMENT_ROOT'] . '/storage/uploads/';
    }
    
    // Generate Random Code
    public static function getCode($len){
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, intval($len));
    }
}