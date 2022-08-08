<?php
session_start();

class ItemModel extends Database
{
    protected function addItem($item_name, $item_description, $item_progress, $list_id)
    {
        try{
            // Inserindo as informações que o usuário nos deu
            $stmt = $this->connect()->
            prepare("
            INSERT INTO
                todo_items (item_name, item_description, item_progress, fk_list_id)
            VALUES
                (?, ?, ?, ?)");

            // Se por algum motivo o Model não injetar os dados no DB
            if(!$stmt->execute(array($item_name, $item_description, $item_progress, $list_id)))
            {
                $stmt = null;
                header("location: ../../todolist?uid=" . base64_encode($_SESSION["UID"]) . "&lid=" . $list_id . "error=stmtfailed");
                exit();
            }
            
            unset($stmt);

        } catch (PDOException $e){
            print "ERROR: " . $e->getMessage() . "<br/>";
            exit;
        }
    }

    protected function uptItem($item_name, $item_description, $item_progress, $item_id, $list_id)
    {
        try{
            // Inserindo as informações que o usuário nos deu
            $stmt = $this->connect()->
            prepare("
            UPDATE
                todo_items
            SET
                item_name = ?, item_description = ?, item_progress = ?, fk_list_id = ?
            WHERE
                item_id = ?");
                
            // Se por algum motivo o Model não injetar os dados no DB
            if(!$stmt->execute(array($item_name, $item_description, $item_progress, $item_id)))
            {
                $stmt = null;
                header("location: ../../todolist?uid=" . base64_encode($_SESSION["UID"]) . "&lid=" . $list_id . "error=stmtfailed");
                exit();
            }
            
            unset($stmt);

        } catch (PDOException $e){
            print "ERROR: " . $e->getMessage() . "<br/>";
            exit;
        }
    }

    public function delItem($item_id, $list_id)
    {
        try{
            // Deletando as informações que o usuário nos deu
            $stmt = $this->connect()->
            prepare("
            DELETE FROM
                todo_items
            WHERE
                item_id = ?");

            // Executa e verifica se a conexão com o DB foi feita corretamente
            if(!$stmt->execute(array($item_id)))
            {
                $stmt = null;
                header("location: ../../todolist?uid=" . base64_encode($_SESSION["UID"]) . "&lid=" . $list_id . "&iid=" . $item_id . "&error=stmtfailed");
                exit();
            }
            unset($stmt);

        } catch (PDOException $e){
            print "ERROR: " . $e->getMessage() . "<br/>";
            exit;
        }
    }

}