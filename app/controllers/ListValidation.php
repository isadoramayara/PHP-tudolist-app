<?php
session_start();

class ListValidation extends ListModel
{
    protected $list_id;
    protected $list_name;
    protected $list_description;

    // Pega os dados instanciados
    public function __construct($list_id, $list_name, $list_description)
    {
        $this->list_id = $list_id;
        $this->list_name = $list_name;
        $this->list_description = $list_description;
    }

    // Valida se o formulário está apto a ser lançado
    public function setList($list_id, $list_name, $list_description)
    {
        
        switch(true)
        {
            case $this->isEmpty() == false:
                // Algum campo ficou vazio
                header("location: ../../dashboard?uid=" . base64_encode($_SESSION["UID"]) . "&error=emptyinput");
                exit(); break;

            case $this->titleMax() == false:
                // Titulo muito grande
                header("location: ../../dashboard?uid=" . base64_encode($_SESSION["UID"]) . "&error=titlebig");
                exit(); break;

            case $this->descMax() == false:
                // Descrição muito grande
                header("location: ../../dashboard?uid=" . base64_encode($_SESSION["UID"]) . "&error=descbig");
                exit(); break;
        }
        
        if(isset($_POST['submitAdd'])){
            $this->addList($this->list_name = $list_name, 
                           $this->list_description = $list_description);
            
        }
        elseif(isset($_POST['submitUpdate'])){$this->uptList($this->list_id = $list_id,
                                              $this->list_name = $list_name, 
                                              $this->list_description = $list_description);
        }

    }
    
    public function delList($list_id)
    {
        $this->delList($this->list_id = $list_id);
    }

    // Valida se o usuário deixou algum campo vazio ou não
    protected function isEmpty()
    {
        $notEmpty = empty($this->list_name)? false : true;
        
        return $notEmpty;
    }

    // Valida se o usuário excedeu no numero de caracteres
    protected function titleMax()
    {
        $itExceeds =  strlen($this->list_name) > 24 ? false : true;
        return $itExceeds;
    }

    // Valida se o usuário excedeu no numero de caracteres
    protected function descMax()
    {
        $itExceeds =  strlen($this->list_description) > 161 ? false : true;
        
        return $itExceeds;
    }

}