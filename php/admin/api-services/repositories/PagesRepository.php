<?php

// Used in PagesController.php
class PagesRepository {
    
    private static $table = "tbl_pages";

    public static function getAll() {
        // Get pages from database
        $dbConn = ConstantsConfig::dbConn();
        $stmt = $dbConn->prepare("SELECT * FROM " . self::$table);
        $stmt->execute();
        $results = $stmt->get_result();
        
        // Close connection
        $stmt->close();
        $dbConn->close();

        // Prepare page list
        $page_list = [];
        while ($row = $results->fetch_assoc()) {
            PageModel::set(
                $row['pkId'],
                $row['intMenuId'],
                $row['strTitle'],
                $row['strRoute'],
                $row['strPath'],
                $row['strCaption'],
                $row['strBody'],
                $row['intStatus'] > 0 ? true : false,
                $row['intOrder'],
                $row['dtCreatedAt'],
                $row['dtUpdatedAt']
            );
            array_push($page_list, PageModel::get());
        }

        // return page list
        return $page_list;
    }

    public static function getActive(){
        // Get pages from database
        $dbConn = ConstantsConfig::dbConn();
        $val = 1;
        $stmt = $dbConn->prepare("SELECT * FROM " . self::$table . " WHERE intStatus = ?");
        $stmt->bind_param("i", $val);
        $stmt->execute();
        $results = $stmt->get_result();
        
        // Close connection
        $stmt->close();
        $dbConn->close();

        // Prepare page list
        $page_list = [];
        while ($row = $results->fetch_assoc()) {
            self::$page->set(
                $row['pkId'],
                $row['intMenuId'],
                $row['strTitle'],
                $row['strRoute'],
                $row['strPath'],
                $row['strCaption'],
                $row['strBody'],
                $row['intStatus'] > 0 ? true : false,
                $row['intOrder'],
                $row['dtCreatedAt'],
                $row['dtUpdatedAt']
            );
            array_push($page_list, self::$page->get());
        }

        // return page list
        return $page_list;
    }

    public static function getByMenu($menu_id){
        // Get pages from database
        $dbConn = ConstantsConfig::dbConn();
        $stmt = $dbConn->prepare("SELECT * FROM " . self::$table . " WHERE intMenuId = ?");
        $stmt->bind_param("i", intval($menu_id));
        $stmt->execute();
        $results = $stmt->get_result();
        
        // Close connection
        $stmt->close();
        $dbConn->close();

        // Prepare page list
        $page_list = [];
        while ($row = $results->fetch_assoc()) {
            PageModel::set(
                $row['pkId'],
                $row['intMenuId'],
                $row['strTitle'],
                $row['strRoute'],
                $row['strPath'],
                $row['strCaption'],
                $row['strBody'],
                $row['intStatus'] > 0 ? true : false,
                $row['intOrder'],
                $row['dtCreatedAt'],
                $row['dtUpdatedAt']
            );
            array_push($page_list, PageModel::get());
        }

        // return page list
        return $page_list;
    }

    public static function getByMenuActive($menu_id){
        // Get pages from database
        $dbConn = ConstantsConfig::dbConn();
        $stmt = $dbConn->prepare("SELECT * FROM " . self::$table . " WHERE intMenuId = ? AND intStatus = 1 ORDER BY intOrder");
        $stmt->bind_param("i", intval($menu_id));
        $stmt->execute();
        $results = $stmt->get_result();
        
        // Close connection
        $stmt->close();
        $dbConn->close();

        // Prepare page list
        $page_list = [];
        while ($row = $results->fetch_assoc()) {
            PageModel::set(
                $row['pkId'],
                $row['intMenuId'],
                $row['strTitle'],
                $row['strRoute'],
                $row['strPath'],
                $row['strCaption'],
                $row['strBody'],
                $row['intStatus'] > 0 ? true : false,
                $row['intOrder'],
                $row['dtCreatedAt'],
                $row['dtUpdatedAt']
            );
            array_push($page_list, PageModel::get());
        }

        // return page list
        return $page_list;
    }

    public static function find($id) {
        // Get pages from database
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
        PageModel::set(
            $row['pkId'],
            $row['intMenuId'],
            $row['strTitle'],
            $row['strRoute'],
            $row['strPath'],
            $row['strCaption'],
            $row['strBody'],
            $row['intStatus'] > 0 ? true : false,
            $row['intOrder'],
            $row['dtCreatedAt'],
            $row['dtUpdatedAt']
        );
        return PageModel::get();
    }

    public static function findLive($id) {
        // Get pages from database
        $dbConn = ConstantsConfig::dbConn();
        $stmt = $dbConn->prepare("SELECT * FROM " . self::$table . " WHERE pkId = ? AND intStatus = 1");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Close connection
        $stmt->close();
        $dbConn->close();

        // Prepare result
        $row = $result->fetch_assoc();
        PageModel::set(
            $row['pkId'],
            $row['intMenuId'],
            $row['strTitle'],
            $row['strRoute'],
            $row['strPath'],
            $row['strCaption'],
            $row['strBody'],
            $row['intStatus'] > 0 ? true : false,
            $row['intOrder'],
            $row['dtCreatedAt'],
            $row['dtUpdatedAt']
        );
        return PageModel::get();
    }

    public static function create($page_data) {
        // Get pages from database
        $dbConn = ConstantsConfig::dbConn();
        $date_time = date("Y-m-d H:i:s");
        $stmt = $dbConn->prepare("INSERT INTO " . self::$table . " (intMenuId, strTitle, strRoute, strPath, strCaption, strBody, intStatus, intOrder, dtCreatedAt, dtUpdatedAt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssssiiss", intval($page_data->menu_id), $page_data->title, $page_data->route, $page_data->path, $page_data->caption, $page_data->body, intval($page_data->status), intval($page_data->order), $date_time, $date_time);
        $stmt->execute();
        $result = $stmt->insert_id;

        // Close connection
        $stmt->close();
        $dbConn->close();

        return $result;
    }

    public static function update($id, $page_data){        
        // Get pages from database
        $dbConn = ConstantsConfig::dbConn();
        $date_time = date("Y-m-d H:i:s");
        $stmt = $dbConn->prepare("UPDATE " . self::$table . " SET intMenuId = ?, strTitle = ?, strRoute = ?, strPath = ?, strCaption = ?, strBody = ?, intStatus = ?, intOrder = ?, dtUpdatedAt = ? WHERE pkId = ?");
        $stmt->bind_param("isssssiisi", intval($page_data->menu_id), $page_data->title, $page_data->route, $page_data->path, $page_data->caption, $page_data->body, intval($page_data->status), intval($page_data->order), $date_time, intval($id));
        $status = $stmt->execute();

        // Close connection
        $stmt->close();
        $dbConn->close();

        return $status;
    }

    public static function delete($id){        
        // Get pages from database
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