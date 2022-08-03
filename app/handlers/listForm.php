<?php
session_start();

// Pegando os dados da url (GET)
$list_id = $_GET["lid"];
$list_name = $_POST["listName"];
$list_description = $_POST["listDescription"];

$deleteList = $_GET["del"];

// Instanciando a classe ListValidation, List Model e includindo o DB
include "../helpers/db-connect.php";
include "../models/ListModel.php";
include "../controllers/ListValidation.php";


if ($deleteList == 'true')
{
    // Instanciando a classe  
    $list = new ListModel($list_id);
    header("location: ../../dashboard?uid=" . base64_encode($_SESSION["UID"]) . "&error=none");
    $list->delList($list_id);
}
else if(isset($_POST) && isset($_GET))
{
    
    // Instanciando a classe  
    $list = new ListValidation($list_id, $list_name, $list_description);
    
    // Rodando os erros e/ou o registro do usuário
    $list->setList($list_id, $list_name, $list_description);
    
    // Voltando pra view
    header("location: ../../dashboard?uid=" . base64_encode($_SESSION["UID"]) . "&error=none");

}
?>