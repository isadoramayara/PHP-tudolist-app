<div class="popup-messages">

    <div class="popup-wrapper" id="popup-window">
        <div class="text-wrapper">
        <?php
            switch(true)
            {
                case $_GET['error'] == 'emptyinput':
                    echo "<span><p class='pop-up red'>ERRO: Dados importantes precisam ser preenchidos</p></span>";
                    break;

                case $_GET['error'] == 'invalidname':
                    echo "<span><p class='pop-up red'>ERRO: Nome contém caracteres inválidos</p></span>";
                    break;

                case $_GET['error'] == 'invalidemail':
                    echo "<span><p class='pop-up red'>ERRO: E-mail contém caracteres inválidos</p></span>";
                    break;

                case $_GET['error'] == 'notmatch':
                    echo "<span><p class='pop-up red'>ERRO: As senhas não batem</p></span>";
                    break;

                case $_GET['error'] == 'emailused':
                    echo "<span><p class='pop-up yellow'>AVISO: Esse e-mail está sendo utilizado</p></span>";
                    break;

                case $_GET['error'] == 'nouser':
                    echo "<span><p class='pop-up yellow'>AVISO: Não existe um usuário com esse e-mail no sistema</p></span>";
                    break;

                case $_GET['error'] == 'wrongcred':
                    echo "<span><p class='pop-up red'>ERRO: Senha ou e-mail estão errados</p></span>";
                    break;

                case $_GET['error'] == 'stmtfailed':
                    echo "<span><p class='pop-up yellow'>AVISO: Nosso banco de dados falhou. Tente novamente mais tarde.</p></span>";
                    break;
                
                case $_GET['error'] == 'titlebig':
                    echo "<span><p class='pop-up red'>ERRO: Seu título excedeu o limite máximo de caracteres</p></span>";
                    break;
                
                case $_GET['error'] == 'descbig':
                    echo "<span><p class='pop-up red'>ERRO: Sua descrição excedeu o limite máximo de caracteres</p></span>";
                    break;
                
                    
                case $_GET['error'] == 'none':
                    echo "<span><p class='pop-up green'>Ação realizada com sucesso!</p></span>";
                    break;

                default:
                    break;
            }

        ?>


        </div>
    </div>

</div>
