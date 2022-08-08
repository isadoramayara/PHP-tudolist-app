<?php

class Database
{
    protected function connect()
    {
        try{
            $db_username = "";
            $db_password = "";
            $db_handler = new PDO('pgsql:;
            dbname=', $db_username, $db_password);

            return $db_handler;

        }catch(PDOException $e){
            print "ERROR: " . $e->getMessage() . "<br/>";
            exit;
        }
    }

}