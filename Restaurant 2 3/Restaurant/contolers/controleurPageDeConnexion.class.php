<?php
include_once("controleur.abstract.class.php");

class PageDeConnexion extends Controleur {

    public function __construct() {
        parent::__construct();
    }

    public function executerAction(): string
    {
        return "pageDeConnexion";
    }
}
?>