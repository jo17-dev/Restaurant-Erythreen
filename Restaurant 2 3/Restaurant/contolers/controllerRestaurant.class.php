<?php
include_once(__DIR__ . "/controllerAjouterReservation.class.php");
include_once(__DIR__ . "/controleurAcceuil.class.php");
include_once(__DIR__ . "/controleurAcceuilEnglish.class.php");
include_once(__DIR__ . "/controleurCommander.class.php");
include_once(__DIR__ . "/controleurCommanderEnglish.class.php");
include_once(__DIR__ . "/controleurMenu.class.php");
include_once(__DIR__ . "/controleurMenuEnglish.php");
include_once(__DIR__ . "/controleurReservationP.class.php");
include_once(__DIR__ . "/controleurReservationEnglish.class.php");
include_once(__DIR__ . "/controleurAjouterCommande.class.php");
include_once(__DIR__ . "/../modele/commander.class.php");
include_once(__DIR__ . "/controleurPageDeConnexion.class.php");


class Restaurant
{
    public static function creerControleur($action):Controleur
    {
        $controleur = null;
        if ($action == "ajouterReservation") {$controleur = new AjouterReservation();}
        elseif ($action == "Acceuil") {$controleur = new Acceuil();}
        elseif ($action == "Menu") {$controleur = new Menu();}
        elseif ($action == "Commander") {$controleur = new Commander();}
        elseif ($action == "ReservationP") {$controleur = new ReservationP();}
        elseif ($action == "AcceuilEnglish") {$controleur = new AcceuilEnglish();}
        elseif ($action == "MenuEnglish") {$controleur = new MenuEnglish();}
        elseif ($action == "CommanderEnglish") {$controleur = new CommanderEnglish();}
        elseif ($action == "ReservationEnglish") {$controleur = new ReservationEnglish();}
        elseif ($action == "ajouterCommande") {$controleur = new AjouterCommande();}
        elseif ($action == "ajouterCommandeEnglish") {$controleur = new AjouterCommande();}
        elseif ($action == "pageDeConnexion") {$controleur = new PageDeConnexion();}
        
        else{$controleur = new Acceuil();}
        return $controleur;




    }

}
?>