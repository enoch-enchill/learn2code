<?php

class MenusController
{
    public static function index(){
        $menus = MenusRepository::getAll();
        
        // Result Data        
        $data = [
            "error" => 1,
            "body" => "No menus found."
        ];
        if($menus != null && count($menus) > 0){
            $data = [
                "error" => 0,
                "body" => $menus
            ];
        }
        echo json_encode($data);
    }
    
    public static function pages(){
        $menus = MenusRepository::getAll();
        
        // Result Data        
        $data = [
            "error" => 1,
            "body" => "No menus found."
        ];
        if($menus != null && count($menus) > 0){
            $body = [];
            foreach($menus as $menu){
                $menu_id =  $menu['id'];
                $pages = PagesRepository::getByMenu($menu_id);
                $menu['pages'] = $pages != null && count($pages) > 0 ? $pages : null;
                array_push($body, $menu);
            }
            $data = [
                "error" => 0,
                "body" => $body
            ];
        }
        echo json_encode($data);
    }
        
    public static function live(){
        $menus = MenusRepository::getActive();
        
        // Result Data        
        $data = [
            "error" => 1,
            "body" => "No menus found."
        ];
        
        if($menus != null && count($menus) > 0){
            $body = [];
            foreach($menus as $menu){
                $menu_id =  $menu['id'];
                $pages = PagesRepository::getByMenuActive($menu_id);
                $menu['pages'] = $pages != null && count($pages) > 0 ? $pages : null;
                array_push($body, $menu);
            }
            $data = [
                "error" => 0,
                "body" => $body
            ];
        }
        echo json_encode($data);
    }

    public static function find($id){
        $menu = (object)MenusRepository::find($id);

        // Result Data        
        $data = [
            "error" => 1,
            "body" => "Operation failed."
        ];
        if($menu != null){
            $data = [
                "error" => 0,
                "body" => $menu
            ];
        }
        echo json_encode($data);         
    }

    public static function create(){
        // POST Data
        $menu_data = (object)[
            "title" => $_POST['title'],
            "route" => $_POST['route'],
            "path" => $_POST['path'],
            "caption" => $_POST['caption'],
            "status" => $_POST['status'],
            "order" => $_POST['order']
        ];
        $menu = (object)MenusRepository::create($menu_data);

        // Result Data        
        $data = [
            "error" => 1,
            "body" => "Operation failed."
        ];
        if($menu != null){
            $data = [
                "error" => 0,
                "body" => $menu
            ];
        }
        echo json_encode($data);        
    }

    public static function update($id){
        // POST Data
        $menu_data = (object)[
            "title" => $_POST['title'],
            "route" => $_POST['route'],
            "path" => $_POST['path'],
            "caption" => $_POST['caption'],
            "status" => $_POST['status'],
            "order" => $_POST['order']
        ];
        $menu = (object)MenusRepository::update($id, $menu_data);

        // Result Data        
        $data = [
            "error" => 1,
            "body" => "Operation failed."
        ];
        if($menu){
            $data = [
                "error" => 0,
                "body" => $menu
            ];
        }
        echo json_encode($data);
    }

    public static function delete($id){
        $menu = (object)MenusRepository::delete($id);

        // Result Data        
        $data = [
            "error" => 1,
            "body" => "Operation failed."
        ];
        if($menu){
            $data = [
                "error" => 0,
                "body" => $menu
            ];
        }
        echo json_encode($data); 
    }
}