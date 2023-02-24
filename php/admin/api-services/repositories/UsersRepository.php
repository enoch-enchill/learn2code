<?php

// Used in UsersController.php
class UsersRepository {
    
    private static $table = "tbl_users";
    
    public static function getAll() {
        // Get users from database
        $dbConn = ConstantsConfig::dbConn();
        $stmt = $dbConn->prepare("SELECT * FROM " . self::$table);
        $stmt->execute();
        $results = $stmt->get_result();
        
        // Close connection
        $stmt->close();
        $dbConn->close();

        // Prepare user list
        $user_list = [];
        while ($row = $results->fetch_assoc()) {
            UserModel::set(
                $row['pkId'],
                $row['strName'],
                $row['strEmail'],
                $row['strPhone'],
                $row['strPassword'],
                $row['intIsAdmin'] > 0 ? true : false,
                $row['intIsActive'] > 0 ? true : false,
                $row['dtCreatedAt'],
                $row['dtUpdatedAt']
            );
            array_push($user_list, UserModel::get());
        }

        // return user list
        return $user_list;
    }

    public static function find($id) {
        // Get users from database
        $dbConn = ConstantsConfig::dbConn();
        $stmt = $dbConn->prepare("SELECT * FROM " . self::$table . " WHERE pkId = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Close connection
        $stmt->close();
        $dbConn->close();

        // Prepare result
        $row = $result->fetch_assoc();
        UserModel::set(
            $row['pkId'],
            $row['strName'],
            $row['strEmail'],
            $row['strPhone'],
            $row['strpassword'],
            $row['intIsAdmin'] > 0 ? true : false,
            $row['intIsActive'] > 0 ? true : false,
            $row['dtCreatedAt'],
            $row['dtUpdatedAt']
        );
        return UserModel::get();
    }

    public static function getByEmail($email) {
        // Get users from database
        $dbConn = ConstantsConfig::dbConn();
        $stmt = $dbConn->prepare("SELECT * FROM " . self::$table . " WHERE strEmail = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Close connection
        $stmt->close();
        $dbConn->close();

        // Prepare result
        $row = $result->fetch_assoc();
        UserModel::set(
            $row['pkId'],
            $row['strName'],
            $row['strEmail'],
            $row['strPhone'],
            $row['strPassword'],
            $row['intIsAdmin'] > 0 ? true : false,
            $row['intIsActive'] > 0 ? true : false,
            $row['dtCreatedAt'],
            $row['dtUpdatedAt']
        );
        return UserModel::get();
    }

    public static function create($user_data) {
        // Get users from database
        $dbConn = ConstantsConfig::dbConn();
        $date_time = date("Y-m-d H:i:s");
        $user_pass = password_hash($user_data->password, PASSWORD_DEFAULT);
        $stmt = $dbConn->prepare("INSERT INTO " . self::$table . " (strName, strEmail, strPhone, strPassword, dtCreatedAt, dtUpdatedAt) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $user_data->name, $user_data->email, $user_data->phone, $user_pass, $date_time, $date_time);
        $stmt->execute();
        $result = $stmt->get_result();

        // Close connection
        $stmt->close();
        $dbConn->close();

        return getByEmail($user_data->email);
    }
}