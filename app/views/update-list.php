<?php

session_start();

if(!isset($_SESSION['UID']) || base64_decode($_GET['uid']) != $_SESSION['UID'])
{
    session_unset();
    session_destroy();
    header("location: home");
}

require 'app/models/ReadData.php';

$rows = new ReadData($UID);
$rows = $rows->readListInfo($_GET['lid']);

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
    <title>Atualizar Lista | TudoList</title>
</head>

<body>

    <header>
        <?php include("includes/homepage-nav.php"); ?>
    </header>
    
    <main>

        <article class="form-article">

            <section class="form">
                <h2>Alterar Lista:</h2>

                    <label for="list-form">

                        <form class="add-list" id="item-form" action="app/handlers/listForm.php?lid=<?php echo $_GET['lid'] ?>" method="POST">

                        <label for="listName">* Nome da lista:</label>
                        <input maxlength="23" type="text"  name="listName" value="<?php echo $rows[0]['list_name']?>">
                        <p class="max-length">MAX: 23 caracteres</p>

                        <label for="itemDescription">Descrição:</label>
                        <textarea maxlength="160" name="listDescription"><?php echo $rows[0]['list_description']?></textarea>
                        <p class="max-length">MAX: 160 caracteres</p>

                        <label><input type="submit" name="submitUpdate" value="Atualizar lista"></label>
            
                        </form>

                    </label>

                    <a href="dashboard?uid=<?php echo base64_encode($_SESSION['UID'])?>"><i class="fa-solid fa-angles-left"></i> Voltar às listas</a>
            </section>
        </article>



    </main>
    
</body>

</html>

<script text="javascript/text" src="assets/scripts/modal-window.js"></script>
<script text="javascript/text" src="assets/scripts/btn-interactions.js"></script>
