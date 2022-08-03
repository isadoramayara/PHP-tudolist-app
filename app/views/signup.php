<?php

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
    <title>Registre-se | TudoList</title>
</head>

<body>

    <?php include("includes/homepage-nav.php"); ?>

    <main>

        <article class="form-article">

            <section class="form">
                <h2>Sign-Up</h2>
                
                    <form class="forms" id="signup" action="app/handlers/signupForm.php" method="POST">
                    
                        <label for="firstname">Seu nome:</label>
                        <input type="text" name="user_fname" placeholder="John" value="">

                        <label for="lastname">Seu sobrenome:</label>
                        <input type="text" name="user_lname" placeholder="Doe" value="">
                        
                        <label for="email-signup">Seu e-mail:</label>
                        <input type="email" name="user_email" placeholder="john@domain.com" value="">

                        <label for="password-signup">Digite uma senha:</label>
                        <input type="password" name="user_pwrd" placeholder="password" value="">

                        <label for="passwordVerify">Re-escreva senha escolhida:</label>
                        <input type="password" name="user_pwrdVerify" placeholder="password">

                        <label><input type="submit" name="signUpSubmit" value="Registrar-se"></label>

                    </form> <!-- end of form --->
            </section> <!-- end of section --->

        </article>

        <?php include("includes/pop-ups.php"); ?>

    </main>

</body>

</html>