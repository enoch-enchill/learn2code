<?php

class UsersController {

    public static function index(){
        $data = [
            "error" => 1,
            "body" => "No records found"
        ];
        $users = UsersRepository::getAll();
        if(count($users) > 0){
            $data = [
                "error" => 0,
                "body" => $users
            ];
        }
        echo json_encode($data);
    }

    public static function login() {
        // POST Data
        $user_data = (object)[
            "email" => $_POST['email'],
            "password" => $_POST['password']
        ];
        $user = (object)UsersRepository::getByEmail($user_data->email);

        // Result Data
        $data = [
            "error" => 1,
            "body" => "Login failed."
        ];
        if($user != null && $user->id){
            $is_valid = password_verify($user_data->password, $user->password);
            if($is_valid){
                $model = (object)[
                    "id" => $user->id,
                    "name" => $user->name,
                    "phone" => $user->phone,
                    "is_admin" => $user->is_admin,
                ];
                SessionConfig::set_user($model);
                $data = [
                    "error" => 0,
                    "body" => "Login successful."
                ];
            }
        }
        echo json_encode($data); 
    }
    

    public static function create() {
        // POST Data
        $user_data = (object)[
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "phone" => $_POST['phone'],
            "password" => $_POST['password']
        ];
        $user = (object)UsersRepository::create($user_data);

        // Result Data        
        $data = [
            "error" => 1,
            "body" => "Operation failed due to network error."
        ];
        if($user != null && $user->id){
            $data = [
                "error" => 0,
                "body" => $user
            ];
        }
        echo json_encode($data); 
    }
}