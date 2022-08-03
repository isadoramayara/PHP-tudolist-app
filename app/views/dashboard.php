<?php

session_start();

if(!isset($_SESSION['UID']) || base64_decode($_GET['uid']) != $_SESSION['UID'])
{
    session_unset();
    session_destroy();
    header("location: home");
}

include 'app/models/ReadData.php';

$rows = new ReadData($UID);
$rows = $rows->readLists($_SESSION['UID']);
$rows = array_reverse($rows);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="css/text" href="assets/css/dashboard.css">
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/f5dacd22a4.js" crossorigin="anonymous"></script>
    <title>Página Inicial | TudoList</title>
</head>

<body>

    <?php include("includes/homepage-nav.php"); ?>
    
    <main>

        <article class="modal-screen">
            
            <?php include("includes/add-list.php"); ?>
                
        </article>

        <article class="main-article">

            <section class="welcome-message">
                    <h1>Olá, <?php echo $_SESSION['userName']?></h1>
                        <p>
                            <?php if(count($rows) == 0)
                               {
                                echo "Parece que você ainda não tem nenhuma lista to-do! Clique no card abaixo para começar.";
                               }else
                               {
                                echo "Suas listas to-do estão aqui abaixo esperando por você!";
                               }
                            ?>
                        </p>
            </section>

            <section class="list-container">
                <div class="list-wrapper">

                <div class="list-box">
                    <button class="fa-solid fa-plus" onclick="showModal()"></button>
                </div>

                <?php foreach ($rows as $key => $value){ ?>
                    <div class="list-box">
                        <div class="cell-button">
                            <a class="fa-solid fa-pencil" href="update-list?uid=<?php echo base64_encode($_SESSION['UID']) . '&lid='?><?php echo $value['list_id']?>"></a>
                            <a class="fa-solid fa-trash-can" href="#"
                            onclick="deleteList('<?=$value['list_name']?>', '<?=$value['list_id']?>')"></a>
                        </div>

                        <h2><?php echo $value['list_name']?></h2>
                            <p class="description"><span>Descrição: </span><?php echo $value['list_description']?></p>
                            <p><span>Criado em: </span><?php echo date(mb_substr($value["created_at"], 0, 19))?></p>
                            <a href="todolist?uid=<?php echo base64_encode($_SESSION['UID']) . '&lid='?><?php echo $value['list_id']?>">Acessar</a>
                    </div>
                <?php $i++; } ?>

                </div>

            </section>

        </article>

        <?php include("includes/pop-ups.php"); ?>

    </main>
     
</body>

</html>

<script text="javascript/text" src="assets/scripts/modal-window.js"></script>
<script text="javascript/text">
    function deleteList(list_name, list_id)
    {
        if(confirm('Você deseja excluir a lista "'+ list_name +'" e todas as suas dependências?'))
        {
            document.location.href = "app/handlers/listForm.php?lid="+ list_id +"&del=true";
        }
    }
</script>