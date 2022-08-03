<?php
session_start();

// Pegando os dados da url (GET)
$list_id = $_GET["lid"];
$item_id = $_GET["iid"];
$item_name = $_POST["itemName"];
$item_description = $_POST["itemDescription"];
$item_progress = $_POST["itemProgression"];

// Verificando se houve um pedido de deleção
$deleteitem = $_GET["del"];

// Instanciando a classe itemValidation, item Model e includindo o DB
include "../helpers/db-connect.php";
include "../models/ItemModel.php";
include "../controllers/ItemValidation.php";

if ($deleteitem == 'true')
{
    // Instanciando a classe  
    $list = new ItemModel($item_id, $list_id);
    $list->delItem($item_id, $list_id);

    header("location: ../../todolist?uid=" . base64_encode($_SESSION["UID"]) . "&lid=" . $list_id . "&error=none");
    exit();
}

if(isset($_POST) && isset($_GET))
{
    // Instanciando a classe  
    $item = new ItemValidation($item_id, $item_name, $item_description, $item_progress, $list_id);
    
    // Rodando os erros e/ou o registro do usuário
    $item->setItem($item_id, $item_name, $item_description, $item_progress, $list_id);
    
    // Voltando pra view
    header("location: ../../todolist?uid=" . base64_encode($_SESSION["UID"]) . "&lid=" . $list_id . "&error=none");
}
else
{
    // Voltando pra view
    header("location: ../../dashboard?uid=" . base64_encode($_SESSION["UID"]) . "&error=noset");
}

?>