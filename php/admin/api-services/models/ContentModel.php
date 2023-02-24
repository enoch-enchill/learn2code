<?php

class ContentModel {
    
    private static $id;
    private static $menu_id;
    private static $page_id;
    private static $title;
    private static $caption;
    private static $body;
    private static $brief;
    private static $thumbnail;
    private static $banner;
    private static $icon;
    private static $route;
    private static $path;
    private static $author_id;
    private static $status;
    private static $created_at;
    private static $updated_at;

    public static function set($id, $menu_id, $page_id, $title, $caption, $body, $brief, $thumbnail, $banner, $icon, $route, $path, $author_id, $status, $created_at, $updated_at){
        self::$id = $id;
        self::$menu_id = $menu_id;
        self::$page_id = $page_id;
        self::$title = $title;
        self::$caption = $caption;
        self::$body = $body;
        self::$brief = $brief;
        self::$thumbnail = $thumbnail;
        self::$banner = $banner;
        self::$icon = $icon;
        self::$route = $route;
        self::$path = $path;
        self::$author_id = $author_id;
        self::$status = $status;
        self::$created_at = $created_at;
        self::$updated_at = $updated_at;
    }

    public static function get(){
        return array(
            "id" => self::$id,
            "menu_id" => self::$menu_id,
            "page_id" => self::$page_id,
            "title" => self::$title,
            "caption" => self::$caption,
            "body" => self::$body,
            "brief" => self::$brief,
            "thumbnail" => self::$thumbnail,
            "banner" => self::$banner,
            "icon" => self::$icon,
            "route" => self::$route,
            "path" => self::$path,
            "author_id" => self::$author_id,
            "status" => self::$status,
            "created_at" => self::$created_at,
            "updated_at" => self::$updated_at,
        );
    }

}