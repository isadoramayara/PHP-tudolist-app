<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" text="css/text" href="assets/css/forms.css">
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/f5dacd22a4.js" crossorigin="anonymous"></script>
    <title>Login | TudoList</title>
</head>

<body>

    <?php include("includes/homepage-nav.php"); ?>

    <main>

        <article class="form-article">

            <section class="form">
                <h2>Login</h2>
                    <form class="forms" id="login" action="app/handlers/loginForm.php" method="POST">
                        <label for="email-login">E-mail:</label>
                        <input type="email" id="email-login" name="user_email" placeholder="E-mail" value="">

                        <label for="password-login">Password:</label>
                        <input type="password" id="password-login" name="user_pwrd" placeholder="Senha" value="">
                        
                        <label><input type="submit" id="loginSubmit" name="loginSubmit" value="Fazer login"></label>
                    </form> <!-- end of form --->

            </section> <!-- end of section --->
        </article>

        <?php include("includes/pop-ups.php"); ?>

    </main>
     
</body>

</html>