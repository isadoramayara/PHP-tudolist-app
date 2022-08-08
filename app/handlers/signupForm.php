<?php

// Só vai acontecer se o submit tiver sido setado
if(isset($_POST["signUpSubmit"]))
{
    // Pegando os dados do formulário Sign-up
    $f_name = $_POST["user_fname"];
    $l_name = $_POST["user_lname"];
    $user_email = $_POST["user_email"];
    $user_pwrd = $_POST["user_pwrd"];
    $user_pwrdVerify = $_POST["user_pwrdVerify"];

    // Incluindo as classes SignupUser e SignupValidation junto com a conexão com o DB
    include "../helpers/db-connect.php";
    include "../models/SignupUser.php";
    include "../controllers/SignupValidation.php";

    // Instanciando SignUpValidation
    $signup = new SignUpValidation($f_name, $l_name, $user_email, $user_pwrd, $user_pwrdVerify);

    // Rodando os erros e/ou o registro do usuário
    $signup->signupUser($f_name, $l_name, $user_email, $user_pwrd);

    // Voltando pra view
    header("location: ../../signup?error=none");
}else
{
    // Voltando pra view
    header("location: ../../signup?error=noset");
}