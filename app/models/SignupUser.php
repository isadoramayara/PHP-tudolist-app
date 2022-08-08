<?php

class SignUpModel extends Database
{

    protected function setUser($f_name, $l_name, $user_email, $user_pwrd)
    {
        try{

            // Inserindo as informações que o usuário nos deu
            $stmt = $this->connect()->
            prepare("
            INSERT INTO
                user_data (user_fname, user_lname, user_email, user_pwrd)
            VALUES
                (?, ?, ?, ?)");

            // Protege as senhas de decriptação
            $hashed_pwrd = password_hash($user_pwrd, PASSWORD_DEFAULT);

            // Se por algum motivo o Model não injetar os dados no DB
            if(!$stmt->execute(array($f_name, $l_name, $user_email, $hashed_pwrd)))
            {
                $stmt = null;
                header("location: ../../signup?error=stmtfailed");
                exit();
            }
            
            unset($stmt);

        } catch (PDOException $e){
            print "ERROR: " . $e->getMessage() . "<br/>";
            exit;
        }
    }


    protected function dataCheck($user_email)
    {
        // Checando se existe um email com o mesmo nome no banco de dados
        try{
            $stmt = $this->connect()->
            prepare("
            SELECT
                user_id
            FROM
                user_data
            WHERE
                user_email = ?");
            
            if(!$stmt->execute(array($user_email)))
            {
                $stmt = null;
                header("location: ../../signup?error=stmtfailed");
                exit();
            }

            $check = $stmt->rowCount() > 0? false : true;

            return $check;
            
        } catch (PDOException $e){
            print "ERROR: " . $e->getMessage() . "<br/>";
            exit;
        }
    }

}