<?php
session_start();

class ListModel extends Database
{
    protected function addList($list_name, $list_description)
    {
        try{
            // Inserindo as informações que o usuário nos deu
            $stmt = $this->connect()->
            prepare("
            INSERT INTO
                lists_todo (list_name, list_description, fk_user_id)
            VALUES
                (?, ?, ?)");

            // Se por algum motivo o Model não injetar os dados no DB
            if(!$stmt->execute(array($list_name, $list_description, $_SESSION["UID"])))
            {
                $stmt = null;
                header("location: ../../dashboard?uid=" . base64_encode($_SESSION["UID"]) . "error=stmtfailed");
                exit();
            }
            
            unset($stmt);

        } catch (PDOException $e){
            print "ERROR: " . $e->getMessage() . "<br/>";
            exit;
        }
    }

    protected function uptList($list_id,$list_name, $list_description)
    {
        try{
            // Inserindo as informações que o usuário nos deu
            $stmt = $this->connect()->
            prepare("
            UPDATE
                lists_todo
            SET
                list_name = ?, list_description = ?
            WHERE
                list_id = ?");

            // Se por algum motivo o Model não injetar os dados no DB
            if(!$stmt->execute(array($list_name, $list_description, $list_id)))
            {
                $stmt = null;
                header("location: ../../dashboard?uid=" . base64_encode($_SESSION["UID"]) . "error=stmtfailed");
                exit();
            }
            
            unset($stmt);

        } catch (PDOException $e){
            print "ERROR: " . $e->getMessage() . "<br/>";
            exit;
        }
    }

    public function delList($list_id)
    {
        try{
            // Deletando as informações que o usuário nos deu
            $stmt = $this->connect()->
            prepare("
            DELETE FROM
                lists_todo
            WHERE
                list_id = ?");

            // Se por algum motivo o Model não injetar os dados no DB
            if(!$stmt->execute(array($list_id)))
            {
                $stmt = null;
                header("location: ../../dashboard?uid=" . base64_encode($_SESSION["UID"]) . "error=stmtfailed");
                exit();
            }
            
            unset($stmt);

        } catch (PDOException $e){
            print "ERROR: " . $e->getMessage() . "<br/>";
            exit;
        }
    }

}