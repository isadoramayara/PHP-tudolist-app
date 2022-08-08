<?php
session_start();

// Pegando os dados da url (GET)
$list_id = $_GET["lid"];
$item_id = $_GET["iid"];
// Coletando pedido de deleção (se houve)
$deleteItem = $_GET["del"];

// Inclundo as classes ItemModel e ItemValidation junto com a conexão com o DB
include "../helpers/db-connect.php";
include "../models/ItemModel.php";
include "../controllers/ItemValidation.php";


if(isset($_POST) && isset($_GET))
{
    $item_name = $_POST["itemName"];
    $item_description = $_POST["itemDescription"];
    $item_progress = $_POST["itemProgression"];

    // Instanciando a classe  
    $item = new ItemValidation($item_id, $item_name, $item_description, $item_progress, $list_id, $deleteItem);
    
    // Rodando os erros e/ou o registro do usuário
    $item->setItem($item_id, $item_name, $item_description, $item_progress, $list_id, $deleteItem);
    
    // Voltando pra view
    header("location: ../../todolist?uid=" . base64_encode($_SESSION["UID"]) . "&lid=" . $list_id . "&error=none");
}
else
{
    // Voltando pra view
    header("location: ../../dashboard?uid=" . base64_encode($_SESSION["UID"]) . "&error=noset");
}

?>