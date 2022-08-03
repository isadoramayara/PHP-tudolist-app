<?php
session_start();

class ItemValidation extends ItemModel
{
    protected $list_id;
    protected $item_id;
    protected $item_name;
    protected $item_description;
    protected $item_progress;

    // Pega os dados instanciados
    public function __construct($item_id, $item_name, $item_description, $item_progress, $list_id)
    {
        $this->item_id = $item_id;
        $this->list_id = $list_id;
        $this->item_name = $item_name;
        $this->item_description = $item_description;
        $this->item_progress = $item_progress;
    }

    // Valida se o formulário está apto a ser lançado
    public function setItem($item_id, $item_name, $item_description, $item_progress, $list_id)
    {       
        
        switch(true)
        {
            case $this->isEmpty() == false:
                // Algum campo ficou vazio
                header("location: ../../todolist?uid=" . base64_encode($_SESSION["UID"]) . "&lid=" . $list_id . "&error=emptyinput");
                exit(); break;

            case $this->titleMax() == false:
                // Titulo muito grande
                header("location: ../../todolist?uid=" . base64_encode($_SESSION["UID"]) . "&lid=" . $list_id . "&error=titlebig");
                exit(); break;

            case $this->descMax() == false:
                // Descrição muito grande
                ("location: ../../todolist?uid=" . base64_encode($_SESSION["UID"]) . "&lid=" . $list_id . "&error=descbig");
                exit(); break;
        }

        
        
        if(isset($_POST['submitAdd'])){
                           $this->addItem(
                           $this->item_name = $item_name, 
                           $this->item_description = $item_description,
                           $this->item_progress = $item_progress,
                           $this->list_id = $list_id,);
            
        }
        elseif(isset($_POST['submitUpdate'])){$this->uptItem(
                                              $this->item_name = $item_name, 
                                              $this->item_description = $item_description,
                                              $this->item_progress = $item_progress,
                                              $this->item_id = $item_id,
                                              $this->list_id = $list_id,);
        }

    }

    public function delItem($list_id, $item_id)
    {
        $this->delItem($this->list_id = $list_id,
                       $this->item_id = $item_id);
    }

    // Valida se o usuário deixou algum campo vazio ou não
    protected function isEmpty()
    {
        $notEmpty = empty($this->item_name)? false : true;
        return $notEmpty;
    }

    // Valida se o usuário excedeu no numero de caracteres
    protected function titleMax()
    {
        $itExceeds =  strlen($this->item_name) > 36 ? false : true;
        return $itExceeds;
    }

    // Valida se o usuário excedeu no numero de caracteres
    protected function descMax()
    {
        $itExceeds =  strlen($this->item_description) > 301 ? false : true;
        
        return $itExceeds;
    }

}