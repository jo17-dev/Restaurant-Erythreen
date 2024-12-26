<?php
include_once "contolers/controllerRestaurant.class.php";


if (!isset($_GET['action'])) {
    $action = "Acceuil";
} else {
    $action = $_GET['action'];
}

$messages = "";
$controleur = Restaurant::creerControleur($action);
$nomVue = $controleur->executerAction();

if ($controleur instanceof AjouterReservation) {
    $heuresDisponibles = $controleur->getHeuresDisponibles();
    $messages = $controleur->getMessage();
} elseif ($controleur instanceof AjouterCommande) {
    $messages = $controleur->getMessage();
}

include_once("vues/" . $nomVue . ".php");
?>