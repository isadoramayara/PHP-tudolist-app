<?php

session_start();

if(!isset($_SESSION['UID']) || base64_decode($_GET['uid']) != $_SESSION['UID'])
{
    session_unset();
    session_destroy();
    header("location: home");
}

require 'app/models/ReadData.php';

$row = new ReadData();
$row = $row->readItems($_GET['iid']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" text="css/text" href="assets/css/forms.css">
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/f5dacd22a4.js" crossorigin="anonymous"></script>
    <title>Alterar item | TudoList</title>
</head>

<body>

    <?php include("includes/homepage-nav.php"); ?>
    
    <main>

        <article class="form-article">

            <section class="form">
                <h2>Alterar Item:</h2>

                    <label for="item-form">
                        <form class="update-item" 
                        action="app/handlers/itemForm.php?lid=<?php echo $_GET['lid']?>&iid=<?php echo $_GET['iid']?>" method="POST" autocomplete="off">

                        <label for="listName">Nome da atividade:</label>
                        <input type="text" maxlength="25" name="itemName" value="<?php echo $row[0]['item_name']?>">

                        <label for="itemDescription">Descrição:</label>
                        <textarea maxlength="250" name="itemDescription"><?php echo $row[0]['item_description']?></textarea>

                        <label for="itemProgression">Progresso:</label>
                            <select name="itemProgression" value="<?php echo $row[0]['item_progress']?>">
                                <option value="1">A fazer</option>
                                <option value="2">Sendo feita</option>
                                <option value="3">Finalizada</option>
                            </select>
                            <br/>

                        <label><input type="submit" name="submitUpdate" value="Modificar item"></label>
                        </form>

                        <a href="todolist?uid=<?php echo base64_encode($_SESSION['UID'])?>&lid=<?php echo $_GET['lid']?>">
                        <i class="fa-solid fa-angles-left"></i> Voltar aos itens</a>
                    </label>
            </section>

        </article>

    </main>
    
</body>

</html>

<script text="javascript/text" src="assets/scripts/modal-window.js"></script>
<script text="javascript/text" src="assets/scripts/btn-interactions.js"></script>