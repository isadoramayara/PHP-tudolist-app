<?php
session_start();

// Pegando os dados da url (GET)
$list_id = $_GET["lid"];
$deleteList = $_GET["del"];

// Incluindo as classes ItemModel e ItemValidation junto com a conexão com o DB
include "../helpers/db-connect.php";
include "../models/ListModel.php";
include "../controllers/ListValidation.php";

// Verificando se houve uma requisição de POST e GET
if(isset($_POST) && isset($_GET))
{
    $list_name = $_POST["listName"];
    $list_description = $_POST["listDescription"];
    
    // Instanciando a classe  
    $list = new ListValidation($list_id, $list_name, $list_description, $deleteList);
    
    // Rodando os erros e/ou o registro do usuário
    $list->setList($list_id, $list_name, $list_description, $deleteList);
    
    // Voltando pra view
    header("location: ../../dashboard?uid=" . base64_encode($_SESSION["UID"]) . "&error=none");
}
else
{
    // Voltando pra view
    header("location: ../../dashboard?uid=" . base64_encode($_SESSION["UID"]) . "&error=noset");
}
?>