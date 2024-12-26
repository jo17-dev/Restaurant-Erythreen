<?php

abstract class Controleur {

    protected $messagesErreur = array();
    protected $acteur = "visiteur";

    public function __construct() {
        $this->determinerActeur();
    }

    public function getMessagesErreur(): array {
        return $this->messagesErreur;
    }
    
    public function getActeur(): string {
        return $this->acteur;
    }
    private function determinerActeur(): void {
        session_start();
        if (isset($_SESSION['utilisateurConnecte'])) {
            $this->acteur = "utilisateur";
        }
    }
    abstract public function executerAction(): string;
}
?>
