<?php

class ContentsController
{
    public static function index(){
        $contents = ContentsRepository::getAll();
        
        // Result Data
        $data = [
            "error" => 1,
            "body" => "No contents found."
        ];
        if($contents != null && count($contents) > 0){
            $data = [
                "error" => 0,
                "body" => $contents
            ];
        }
        echo json_encode($data);
    }
    
    public static function active(){
        $contents = ContentsRepository::getActive();
        
        // Result Data
        $data = [
            "error" => 1,
            "body" => "No contents found."
        ];
        if($contents != null && count($contents) > 0){
            $data = [
                "error" => 0,
                "body" => $contents
            ];
        }
        echo json_encode($data);
    }

    public static function find($id){
        $content = (object)ContentsRepository::find($id);

        // Result Data
        $data = [
            "error" => 1,
            "body" => "Operation failed."
        ];
        if($content != null){
            $data = [
                "error" => 0,
                "body" => $content
            ];
        }
        echo json_encode($data);
    }

    public static function create(){
        // POST Data
        $content_data = (object)[
            "menu_id" => $_POST['menu_id'],
            "page_id" => $_POST['page_id'],
            "title" => $_POST['title'],
            "caption" => $_POST['caption'],
            "body" => $_POST['body'],
            "brief" => $_POST['brief'],
            "thumbnail" => ConstantsConfig::getCode(12) . ".png",
            "banner" => ConstantsConfig::getCode(12) . ".png",
            "icon" => $_POST['icon'],
            "route" => $_POST['route'],
            "path" => $_POST['path'],
            "author_id" => $_POST['author_id'],
            "status" => $_POST['status']
        ];
        $content = (object)ContentsRepository::create($content_data);

        // Result Data
        $data = [
            "error" => 1,
            "body" => "Operation failed."
        ];
        if($content != null){
            $data = [
                "error" => 0,
                "body" => $content
            ];
        }
        echo json_encode($data);
    }

    public static function update($id){
        // POST Data
        $content_data = (object)[
            "menu_id" => $_POST['menu_id'],
            "page_id" => $_POST['page_id'],
            "title" => $_POST['title'],
            "caption" => $_POST['caption'],
            "body" => $_POST['body'],
            "brief" => $_POST['brief'],
            "icon" => $_POST['icon'],
            "route" => $_POST['route'],
            "path" => $_POST['path'],
            "author_id" => $_POST['author_id'],
            "status" => $_POST['status']
        ];
        $content = (object)ContentsRepository::update($id, $content_data);

        // Result Data
        $data = [
            "error" => 1,
            "body" => "Operation failed."
        ];
        if($content){
            $data = [
                "error" => 0,
                "body" => $content
            ];
        }
        echo json_encode($data);
    }

    public static function delete($id){
        $content = (object)ContentsRepository::delete($id);

        // Result Data        
        $data = [
            "error" => 1,
            "body" => "Operation failed."
        ];
        if($content){
            $data = [
                "error" => 0,
                "body" => $content
            ];
        }
        echo json_encode($data); 
    }
}