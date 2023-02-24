<?php

// Used in MenusController.php
class MenusRepository {
    
    private static $table = "tbl_menus";

    public static function getAll() {
        // Get menus from database
        $dbConn = ConstantsConfig::dbConn();
        $stmt = $dbConn->prepare("SELECT * FROM ". self::$table);
        $stmt->execute();
        $results = $stmt->get_result();
        
        // Close connection
        $stmt->close();
        $dbConn->close();

        // Prepare menu list
        $menu_list = [];
        while ($row = $results->fetch_assoc()) {
            MenuModel::set(
                $row['pkId'],
                $row['strTitle'],
                $row['strRoute'],
                $row['strPath'],
                $row['strCaption'],
                $row['intStatus'] > 0 ? true : false,
                $row['intOrder'],
                $row['dtCreatedAt'],
                $row['dtUpdatedAt']
            );
            array_push($menu_list, MenuModel::get());
        }

        // return menu list
        return $menu_list;
    }

    public static function getActive(){
        // Get menus from database
        $dbConn = ConstantsConfig::dbConn();
        $val = 1;
        $stmt = $dbConn->prepare("SELECT * FROM " . self::$table . " WHERE intStatus = ? ORDER BY intOrder");
        $stmt->bind_param("i", $val);
        $stmt->execute();
        $results = $stmt->get_result();
        
        // Close connection
        $stmt->close();
        $dbConn->close();

        // Prepare menu list
        $menu_list = [];
        while ($row = $results->fetch_assoc()) {
            MenuModel::set(
                $row['pkId'],
                $row['strTitle'],
                $row['strRoute'],
                $row['strPath'],
                $row['strCaption'],
                $row['intStatus'] > 0 ? true : false,
                $row['intOrder'],
                $row['dtCreatedAt'],
                $row['dtUpdatedAt']
            );
            array_push($menu_list, MenuModel::get());
        }

        // return menu list
        return $menu_list;
    }

    public static function find($id) {
        // Get menus from database
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
        MenuModel::set(
            $row['pkId'],
            $row['strTitle'],
            $row['strRoute'],
            $row['strPath'],
            $row['strCaption'],
            $row['intStatus'] > 0 ? true : false,
            $row['intOrder'],
            $row['dtCreatedAt'],
            $row['dtUpdatedAt']
        );
        return MenuModel::get();
    }

    public static function create($menu_data) {
        // Get menus from database
        $dbConn = ConstantsConfig::dbConn();
        $date_time = date("Y-m-d H:i:s");
        $stmt = $dbConn->prepare("INSERT INTO " . self::$table . " (strTitle, strRoute, strPath, strCaption, intStatus, intOrder, dtCreatedAt, dtUpdatedAt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiiss", $menu_data->title, $menu_data->route, $menu_data->path, $menu_data->caption, intval($menu_data->status), intval($menu_data->order), $date_time, $date_time);
        $stmt->execute();
        $result = $stmt->insert_id;

        // Close connection
        $stmt->close();
        $dbConn->close();

        return $result;
    }

    public static function update($id, $menu_data){        
        // Get menus from database
        $dbConn = ConstantsConfig::dbConn();
        $date_time = date("Y-m-d H:i:s");
        $stmt = $dbConn->prepare("UPDATE " . self::$table . " SET strTitle = ?, strRoute = ?, strPath = ?, strCaption = ?, intStatus = ?, intOrder = ?, dtUpdatedAt = ? WHERE pkId = ?");
        $stmt->bind_param("ssssiisi", $menu_data->title, $menu_data->route, $menu_data->path, $menu_data->caption, intval($menu_data->status), intval($menu_data->order), $date_time, intval($id));
        $status = $stmt->execute();

        // Close connection
        $stmt->close();
        $dbConn->close();

        return $status;
    }

    public static function delete($id){        
        // Get menus from database
        $dbConn = ConstantsConfig::dbConn();
        $stmt = $dbConn->prepare("DELETE FROM " . self::$table . " WHERE pkId = ?");
        $stmt->bind_param("i", $id);
        $status = $stmt->execute();
        
        // Close connection
        $stmt->close();
        $dbConn->close();

        return $status;
    }
}