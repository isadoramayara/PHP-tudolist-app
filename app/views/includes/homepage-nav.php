<nav class="navigation-bar">
    <ul>
        <?php if(isset($_SESSION["UID"])){ ?>
               
            <li><a href="home"> <span class="fa-solid fa-arrow-right-from-bracket"></span> Sair</a></li>
            <li><span class="fa-solid fa-solid fa-user"> </span> <?=strtoupper($_SESSION['userName'])?></li>           
            
        <?php }else{?>

            <li><a href="login"><span class="fa-solid fa-user"></span>Login</a></li>
            <li><a href="signup"><span class="fa-solid fa-user-plus"></span>Registrar-se</a></li>
            <li><a href="home"><span class="fa-solid fa-house"></span>Home</a></li>

        <?php } ?>
     </ul>
</nav>