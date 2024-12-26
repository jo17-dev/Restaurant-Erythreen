<?php
include_once("controleur.abstract.class.php");

class PageAdmin extends Controleur {

    public function __construct() {
        parent::__construct();
    }

    public function executerAction(): string
    {
        return "pageAdmin";
    }
}
?>