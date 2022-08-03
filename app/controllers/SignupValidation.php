<?php

class SignUpValidation extends SignUpModel
{
    protected $first_name;
    protected $last_name;
    protected $user_email;
    protected $user_pwrd;
    protected $user_pwrdVerify;

    // Pega os dados instanciados
    public function __construct($f_name, $l_name, $user_email, $user_pwrd, $user_pwrdVerify)
    {
        $this->first_name = $f_name;
        $this->last_name = $l_name;
        $this->user_email = $user_email;
        $this->user_pwrd = $user_pwrd;
        $this->user_pwrdVerify = $user_pwrdVerify;
    }

    // Valida se o usuário está apto a cadastrar
    public function signupUser($f_name, $l_name, $user_email, $user_pwrd)
    {
        switch(true)
        {
            case $this->isEmpty() == false:
                // Algum campo ficou vazio
                header("location: ../../signup?error=emptyinput");
                exit(); break;

            case $this->invalidNames() == false:
                // Os nomes tem caracteres inválidos
                header("location: ../../signup?error=invalidname");
                exit(); break;

            case $this->invalidEmail() == false:
                // O email tem caracteres inválidos
                header("location: ../../signup?error=invalidemail");
                exit(); break;

            case $this->pwrdMatch() == false:
                // As senhas não batem
                header("location: ../../signup?error=notmatch");
                exit(); break;

            case $this->unusedEmail() == false:
                // O e-mail já foi cadastrado
                header("location: ../../signup?error=emailused");
                exit(); break;
        }

        $this->setUser($this->first_name = $f_name, 
                $this->last_name = $l_name,
                $this->user_email = $user_email,
                $this->user_pwrd = $user_pwrd);

    }

    // Valida se o usuário deixou algum campo vazio ou não
    protected function isEmpty()
    {
        if(empty($this->first_name) || empty($this->last_name) ||
        empty($this->user_email) || empty($this->user_pwrd) || empty($this->user_pwrdVerify))
        {
            $notEmpty = false;
        }
        else
        {
            $notEmpty = true;
        }

        return $notEmpty;
    }

    // Valida se o usuário colocou algum caractere inválido no nome
    protected function invalidNames()
    {
        if(!preg_match("/^[a-zA-Z-' ]*$/", $this->first_name) &&
           !preg_match("/^[a-zA-Z-' ]*$/", $this->last_name))
        {
            $validName = false;
        }
        else
        {
            $validName = true;
        }

        return $validName;
    }

    // Valida se o email está no formato adequado
    protected function invalidEmail()
    {
        $validEmail = !filter_var($this->user_email, FILTER_VALIDATE_EMAIL)? false : true;

        return $validEmail;
    }

    // Valida se o campo senha e repetir senha são iguais
    protected function pwrdMatch()
    {
        $pwrdMatch = $this->user_pwrd !== $this->user_pwrdVerify? false : true;

        return $pwrdMatch;
    }

    // Valida se existe alguém no banco de dados com o mesmo e-mail
    protected function unusedEmail()
    {
        $unusedEmail = !$this->dataCheck($this->user_email)? false : true;

        return $unusedEmail;
    }

}