<?php

class PagesController
{
    public static function index(){
        $pages = PagesRepository::getAll();
        
        // Result Data
        $data = [
            "error" => 1,
            "body" => "No pages found."
        ];
        if($pages != null && count($pages) > 0){        
            $data = [
                "error" => 0,
                "body" => $pages
            ];
        }
        echo json_encode($data);
    }
    
    public static function live($id){
        $page = PagesRepository::findLive($id);
        
        // Result Data        
        $data = [
            "error" => 1,
            "body" => "No pages found."
        ];
        if($page != null){
            $contents = ContentsRepository::getByPageLive($id);
            $page['contents'] = $contents != null && count($contents) > 0 ? $contents : null;
            $data = [
                "error" => 0,
                "body" => $page
            ];
        }
        echo json_encode($data);
    }
    
    public static function byMenu($menu_id){
        $pages = PagesRepository::getByMenu($menu_id);
        
        // Result Data        
        $data = [
            "error" => 1,
            "body" => "No pages found."
        ];
        if($pages != null && count($pages) > 0){
            $data = [
                "error" => 0,
                "body" => $pages
            ];
        }
        echo json_encode($data);
    }

    public static function find($id){
        $page = (object)PagesRepository::find($id);

        // Result Data        
        $data = [
            "error" => 1,
            "body" => "Operation failed."
        ];
        if($page != null){
            $data = [
                "error" => 0,
                "body" => $page
            ];
        }
        echo json_encode($data);         
    }

    public static function create(){
        // POST Data
        $page_data = (object)[
            "menu_id" => $_POST['menu_id'],
            "title" => $_POST['title'],
            "route" => $_POST['route'],
            "path" => $_POST['path'],
            "caption" => $_POST['caption'],
            "body" => $_POST['body'],
            "status" => $_POST['status'],
            "order" => $_POST['order']
        ];
        $page = (object)PagesRepository::create($page_data);

        // Result Data        
        $data = [
            "error" => 1,
            "body" => "Operation failed."
        ];
        if($page != null){
            $data = [
                "error" => 0,
                "body" => $page
            ];
        }
        echo json_encode($data);        
    }

    public static function update($id){        
        // POST Data
        $page_data = (object)[
            "menu_id" => $_POST['menu_id'],
            "title" => $_POST['title'],
            "route" => $_POST['route'],
            "path" => $_POST['path'],
            "caption" => $_POST['caption'],
            "body" => $_POST['body'],
            "status" => $_POST['status'],
            "order" => $_POST['order']
        ];
        $page = (object)PagesRepository::update($id, $page_data);

        // Result Data        
        $data = [
            "error" => 1,
            "body" => "Operation failed."
        ];
        if($page){
            $data = [
                "error" => 0,
                "body" => $page
            ];
        }
        echo json_encode($data);
    }

    public static function delete($id){
        $page = (object)PagesRepository::delete($id);

        // Result Data        
        $data = [
            "error" => 1,
            "body" => "Operation failed."
        ];
        if($page){
            $data = [
                "error" => 0,
                "body" => $page
            ];
        }
        echo json_encode($data); 
    }
}