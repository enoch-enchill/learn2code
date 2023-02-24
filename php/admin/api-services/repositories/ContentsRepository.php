<?php

// Used in ContentsController.php
class ContentsRepository {
    
    private static $table = "tbl_contents";

    public static function getAll() {
        // Get contents from database
        $dbConn = ConstantsConfig::dbConn();
        $stmt = $dbConn->prepare("SELECT * FROM " . self::$table);
        $stmt->execute();
        $results = $stmt->get_result();
        
        // Close connection
        $stmt->close();
        $dbConn->close();

        // Prepare content list
        $content_list = [];
        while ($row = $results->fetch_assoc()) {
            ContentModel::set(
                $row['pkId'],
                $row['intMenuId'],
                $row['intPageId'],
                $row['strTitle'],
                $row['strCaption'],
                $row['strBody'],
                $row['strBrief'],
                $row['imgThumbnail'],
                $row['imgBanner'],
                $row['strIcon'],
                $row['strRoute'],
                $row['strPath'],
                $row['intAuthorId'],
                $row['intStatus'] > 0 ? true : false,
                $row['dtCreatedAt'],
                $row['dtUpdatedAt']
            );
            array_push($content_list, ContentModel::get());
        }

        // return content list
        return $content_list;
    }

    public static function getActive(){
        // Get contents from database
        $dbConn = ConstantsConfig::dbConn();
        $val = 1;
        $stmt = $dbConn->prepare("SELECT * FROM " . self::$table . " WHERE intStatus = ?");
        $stmt->bind_param("i", $val);
        $stmt->execute();
        $results = $stmt->get_result();
        
        // Close connection
        $stmt->close();
        $dbConn->close();

        // Prepare content list
        $content_list = [];
        while ($row = $results->fetch_assoc()) {
            ContentModel::set(
                $row['pkId'],
                $row['intMenuId'],
                $row['intPageId'],
                $row['strTitle'],
                $row['strCaption'],
                $row['strBody'],
                $row['strBrief'],
                $row['imgThumbnail'],
                $row['imgBanner'],
                $row['strIcon'],
                $row['strRoute'],
                $row['strPath'],
                $row['intAuthorId'],
                $row['intStatus'] > 0 ? true : false,
                $row['dtCreatedAt'],
                $row['dtUpdatedAt']
            );
            array_push($content_list, ContentModel::get());
        }

        // return content list
        return $content_list;
    }

    public static function getByPageLive($page_id){
        // Get contents from database
        $dbConn = ConstantsConfig::dbConn();
        $stmt = $dbConn->prepare("SELECT * FROM " . self::$table . "  WHERE intPageId = ? AND intStatus = 1");
        $stmt->bind_param("i", intval($page_id));
        $stmt->execute();
        $results = $stmt->get_result();
        
        // Close connection
        $stmt->close();
        $dbConn->close();

        // Prepare content list
        $content_list = [];
        while ($row = $results->fetch_assoc()) {
            ContentModel::set(
                $row['pkId'],
                $row['intMenuId'],
                $row['intPageId'],
                $row['strTitle'],
                $row['strCaption'],
                $row['strBody'],
                $row['strBrief'],
                $row['imgThumbnail'],
                $row['imgBanner'],
                $row['strIcon'],
                $row['strRoute'],
                $row['strPath'],
                $row['intAuthorId'],
                $row['intStatus'] > 0 ? true : false,
                $row['dtCreatedAt'],
                $row['dtUpdatedAt']
            );
            array_push($content_list, ContentModel::get());
        }

        // return content list
        return $content_list;
    }
    public static function find($id) {
        // Get contents from database
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
        ContentModel::set(
            $row['pkId'],
            $row['intMenuId'],
            $row['intPageId'],
            $row['strTitle'],
            $row['strCaption'],
            $row['strBody'],
            $row['strBrief'],
            $row['imgThumbnail'],
            $row['imgBanner'],
            $row['strIcon'],
            $row['strRoute'],
            $row['strPath'],
            $row['intAuthorId'],
            $row['intStatus'] > 0 ? true : false,
            $row['dtCreatedAt'],
            $row['dtUpdatedAt']
        );
        return ContentModel::get();
    }

    public static function create($content_data) {
        // Get contents from database
        $dbConn = ConstantsConfig::dbConn();
        $date_time = date("Y-m-d H:i:s");
        $stmt = $dbConn->prepare("INSERT INTO " . self::$table . " (intMenuId, intPageId, strTitle, strCaption, strBody, strBrief, imgThumbnail, imgBanner, strIcon, strRoute, strPath, intAuthorId, intStatus, dtCreatedAt, dtUpdatedAt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iisssssssssiiss", intval($content_data->menu_id), intval($content_data->page_id), $content_data->title, $content_data->caption, $content_data->body, $content_data->brief, $content_data->thumbnail, $content_data->banner, $content_data->icon, $content_data->route, $content_data->path, intval($content_data->author_id), intval($content_data->status), $date_time, $date_time);
        $stmt->execute();
        $result = $stmt->insert_id;

        // Close connection
        $stmt->close();
        $dbConn->close();

        return $result;
    }

    public static function update($id, $content_data){        
        // Get contents from database
        $dbConn = ConstantsConfig::dbConn();
        $date_time = date("Y-m-d H:i:s");
        $stmt = $dbConn->prepare("UPDATE " . self::$table . " SET intMenuId = ?, intPageId = ?, strTitle = ?, strCaption = ?, strBody = ?, strBrief = ?, strIcon = ?, strRoute = ?, strPath = ?,intAuthorId = ?, intStatus = ?, dtUpdatedAt = ? WHERE pkId = ?");
        $stmt->bind_param("iisssssssiisi", intval($content_data->menu_id), intval($content_data->page_id), $content_data->title, $content_data->caption, $content_data->body, $content_data->brief, $content_data->icon, $content_data->route, $content_data->path, intval($content_data->author_id), intval($content_data->status), $date_time, intval($id));
        $status = $stmt->execute();

        // Close connection
        $stmt->close();
        $dbConn->close();

        return $status;
    }

    public static function delete($id){        
        // Get contents from database
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