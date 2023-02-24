<?php

class PageModel {
    private static $id;
    private static $menu_id;
    private static $title;
    private static $route;
    private static $path;
    private static $caption;
    private static $body;
    private static $status;
    private static $order;
    private static $created_at;
    private static $updated_at;

    public static function set($id, $menu_id, $title, $route, $path, $caption, $body, $status, $order, $created_at, $updated_at){
        self::$id = $id;
        self::$menu_id = $menu_id;
        self::$title = $title;
        self::$route = $route;
        self::$path = $path;
        self::$caption = $caption;
        self::$body = $body;
        self::$status = $status;
        self::$order = $order;
        self::$created_at = $created_at;
        self::$updated_at = $updated_at;
    }

    public static function get(){
        return array(
            "id" => self::$id,
            "menu_id" => self::$menu_id,
            "title" => self::$title,
            "route" => self::$route,
            "path" => self::$path,
            "caption" => self::$caption,
            "body" => self::$body,
            "status" => self::$status,
            "order" => self::$order,
            "created_at" => self::$created_at,
            "updated_at" => self::$updated_at,
        );
    }

}