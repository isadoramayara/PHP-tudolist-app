<?php

class LoginValidation extends LoginModel
{
    protected $user_email;
    protected $user_pwrd;

    // Pega os dados instanciados
    public function __construct($user_email, $user_pwrd)
    {
        $this->user_email = $user_email;
        $this->user_pwrd = $user_pwrd;
    }

    // Valida se o usuário está apto a logar
    public function loginUser($user_email, $user_pwrd)
    {
        switch(true)
        {
            case $this->isEmpty() == false:
                // Algum campo ficou vazio
                header("location: ../../login?error=emptyinput");
                exit();
        }

        $this->getUser($this->user_email = $user_email, $this->user_pwrd = $user_pwrd);

    }

    // Valida se o usuário deixou algum campo vazio ou não
    protected function isEmpty()
    {
        $notEmpty = empty($this->user_email) || empty($this->user_pwrd)? false : true;
        
        return $notEmpty;
    }

}