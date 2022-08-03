<?php

// Só vai acontecer se o submit tiver sido setado
if(isset($_POST["loginSubmit"]))
{
    // Pegando os dados do formulário de Login
    $user_email = $_POST["user_email"];
    $user_pwrd = $_POST["user_pwrd"];

    // Instanciando a classe LoginValidation
    include "../helpers/db-connect.php";
    include "../models/loginUser.php";
    include "../controllers/LoginValidation.php";

    $login = new LoginValidation($user_email, $user_pwrd);

    // Rodando os erros e/ou a sessão do usuário
    $login->loginUser($user_email, $user_pwrd);

    // Indo para a view Dashboard
    header("location: ../../dashboard?uid=" . base64_encode($_SESSION["UID"]));
}