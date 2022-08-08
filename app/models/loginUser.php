<?php

class LoginModel extends Database
{

    protected function getUser($user_email, $user_pwrd)
    {
        try{
            // Inserindo as informações que o usuário nos deu
            $stmt = $this->connect()->
            prepare("
            SELECT
                user_pwrd
            FROM
                user_data
            WHERE
                user_email = ? OR
                user_fname = ?");

            // Se por algum motivo o Model conseguir buscar as informações no DB
            if(!$stmt->execute(array($user_email, $user_pwrd)))
            {
                unset($stmt);
                header("location: ../../login?error=stmtfailed");
                exit();
            }

            // Checa se existe algum usuário com as informações fornecidas no banco de dados
            if($stmt->rowCount() == 0)
            {
                unset($stmt);
                header("location: ../../login?error=nouser");
                exit();
            }

            $pwrdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $checkPwrd = password_verify($user_pwrd, $pwrdHashed[0]["user_pwrd"]);
            
            // Checa se a senha está correta
            if($checkPwrd == false)
            {
                unset($stmt);
                header("location: ../../login?error=wrongcred");
                exit();
            }
            else
            {
                $stmt = $this->connect()->prepare("
                SELECT 
                    *
                FROM
                    user_data
                WHERE
                    user_email = ? OR
                    user_pwrd = ?");

                if(!$stmt->execute(array($user_email, $user_pwrd)))
                {
                    unset($stmt);
                    header("location: ../../login?error=stmtfailed");
                    exit();
                }

                if($stmt->rowCount() == 0)
                {
                    unset($stmt);
                    header("location: ../../login?error=nouser");
                    exit();
                }

                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            session_start();

            $_SESSION['UID'] = $user[0]['user_id'];
            $_SESSION['userName'] = $user[0]['user_fname'];
            
            unset($stmt);

        } catch (PDOException $e){
            print "ERROR: " . $e->getMessage() . "<br/>";
            exit;
        }
    }

}