<?php
class UserModel {
    private static $id;
    private static $name;
    private static $email;
    private static $phone;
    private static $password;
    private static $is_admin;
    private static $is_active;
    private static $created_at;
    private static $updated_at;

    public static function set($id, $name, $email, $phone, $password, $is_admin, $is_active, $created_at, $updated_at){
        self::$id = $id;
        self::$name = $name;
        self::$email = $email;
        self::$phone = $phone;
        self::$password = $password;
        self::$is_admin = $is_admin;
        self::$is_active = $is_active;
        self::$created_at = $created_at;
        self::$updated_at = $updated_at;
    }

    public static function get(){
        return array(
            "id" => self::$id,
            "name" => self::$name,
            "email" => self::$email,
            "phone" => self::$phone,
            "password" => self::$password,
            "is_admin" => self::$is_admin,
            "is_active" => self::$is_active,
            "created_at" => self::$created_at,
            "updated_at" => self::$updated_at,
        );
    }

}