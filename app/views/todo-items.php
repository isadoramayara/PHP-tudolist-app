<?php
    
session_start();

if(!isset($_SESSION['UID']) || base64_decode($_GET['uid']) != $_SESSION['UID'])
{
    session_unset();
    session_destroy();
    header("location: home");
}

$listID = $_GET["lid"];

include 'app/models/ReadData.php';

$rowTodo = new ReadData();
$rowProg = new ReadData();
$rowFini = new ReadData();
$rowList = new ReadData();

$rowList = $rowList->readListInfo($_GET['lid']);
$rowTodo = $rowTodo->readItemsTodo($_GET['lid']);
$rowProg = $rowProg->readItemsInProgress($_GET['lid']);
$rowFini = $rowFini->readItemsFinished($_GET['lid']);

$rowTodo = array_reverse($rowTodo);
$rowProg = array_reverse($rowProg);
$rowFini = array_reverse($rowFini);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="css/text" href="assets/css/todo-items.css">
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/f5dacd22a4.js" crossorigin="anonymous"></script>
    <title><?php echo $rowList[0]['list_name'] ?> | TudoList</title>
</head>

<body>

    <?php include("includes/homepage-nav.php"); ?>

    <main>

        <article class="modal-screen">
            
            <?php include 'includes/add-item.php'?>

        </article>

        <article class="todo-list-container">
            
            <div class="table-container">

                <div class="table-header">
                    <h2>A Fazer</h2>

                    <div class="table-cell-content">
                        <div class="table-cell plus-sign">
                            <button class="fa-solid fa-plus" onclick="showModal()"></button>
                        </div>

                        <?php foreach ($rowTodo as $key => $value){?>
                            <div class="table-cell">
                                <div class="cell-button">
                                    <a class="fa-solid fa-pencil" href="update-item?uid=<?php echo base64_encode($_SESSION['UID']) 
                                    . '&lid=' . $_GET['lid'] . '&iid=' . $value['item_id']?>"></a>
                                    <a class="fa-solid fa-trash-can " onclick="deleteItem('<?=$value['item_name']?>', '<?=$value['item_id']?>', '<?=$_GET['lid']?>')"></a>
                                </div>
                                <p><?php echo $value["item_name"] ?></p>
                            </div>
                        <?php $i++; } ?>
                    </div>

                </div>

                <div class="table-header">
                    <h2>Sendo feita</h2>
                    
                    <div class="table-cell-content">
                        <div class="table-cell plus-sign">
                            <button class="fa-solid fa-plus" onclick="showModal()"></button>
                        </div>

                        <?php foreach ($rowProg as $key => $value){?>
                            <div class="table-cell">
                                <div class="cell-button">
                                    <a class="fa-solid fa-pencil" href="update-item?uid=<?php echo base64_encode($_SESSION['UID']) 
                                    . '&lid=' . $_GET['lid'] . '&iid=' . $value['item_id']?>"></a>
                                    <a class="fa-solid fa-trash-can" onclick="deleteItem('<?=$value['item_name']?>', '<?=$value['item_id']?>', '<?=$_GET['lid']?>')"></a>
                                </div>
                                <p><?php echo $value["item_name"] ?></p>
                            </div>
                        <?php $i++; } ?>
                    </div>

                </div>

                <div class="table-header">
                    <h2>Finalizadas</h2>

                    <div class="table-cell-content">
                        <div class="table-cell plus-sign">
                            <button class="fa-solid fa-plus" onclick="showModal()"></button>
                        </div>

                        <?php foreach ($rowFini as $key => $value){?>
                            <div class="table-cell">
                                <div class="cell-button">
                                    <a class="fa-solid fa-pencil" href="update-item?uid=<?php echo base64_encode($_SESSION['UID']) 
                                    . '&lid=' . $_GET['lid'] . '&iid=' . $value['item_id']?>"></a>
                                    <a class="fa-solid fa-trash-can" onclick="deleteItem('<?=$value['item_name']?>', '<?=$value['item_id']?>', '<?=$_GET['lid']?>')"></a>
                                </div>
                                <p><?php echo $value["item_name"] ?></p>
                            </div>
                        <?php $i++; } ?>
                    </div>

                </div>

            </div>

        </article>

        <p class="go-back"><a href="dashboard?uid=<?php echo base64_encode($_SESSION['UID'])?>"><i class="fa-solid fa-angles-left"></i> Voltar às listas</a></p>
    
        <?php include("includes/pop-ups.php"); ?>

       </main>
    
    <footer>
        
    </footer>

</body>

</html>

<script text="javascript/text" src="assets/scripts/modal-window.js"></script>
<script text="javascript/text">
    function deleteItem(item_name, item_id, list_id)
    {
        if(confirm('Você deseja excluir o item "'+ item_name +'"?'))
        {
            window.location.href = "app/handlers/itemForm.php?del=true&lid=" + list_id + "&iid=" + item_id;
        }
    }
</script>