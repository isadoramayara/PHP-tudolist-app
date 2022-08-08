<?php

include 'app/helpers/db-connect.php';

class ReadData extends Database
{
    public function readLists($UID)
    {
        $sql = "SELECT * FROM lists_todo WHERE fk_user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array($UID));

        $lists = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $lists;
    }

    public function readListInfo($LID)
    {
        $sql = "SELECT * FROM lists_todo WHERE list_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array($LID));

        $lists = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $lists;
    }

    public function readItems($LID)
    {
        $sql = "SELECT * FROM todo_items WHERE item_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array($LID));

        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $items;
    }

    public function readItemsTodo($LID)
    {
        $sql = "SELECT * FROM todo_items WHERE item_progress = ? AND fk_list_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array(1,$LID));

        $todo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $todo;
    }

    public function readItemsInProgress($LID)
    {
        $sql = "SELECT * FROM todo_items WHERE item_progress = ? AND fk_list_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array(2,$LID));

        $progress = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $progress;
    }

    public function readItemsFinished($LID)
    {
        $sql = "SELECT * FROM todo_items WHERE item_progress = ? AND fk_list_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(array(3,$LID));

        $finish = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $finish;
    }
}

?>