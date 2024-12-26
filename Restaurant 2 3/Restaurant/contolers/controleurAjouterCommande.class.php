<?php
include_once("controleur.abstract.class.php");
include_once("modele/DAO/commanderDAO.class.php");
include_once("modele/commander.class.php");

class AjouterCommande extends Controleur
{
    private $message;

    public function __construct()
    {
        parent::__construct();
        $this->message = "";
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function executerAction(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name']) && isset($_POST['combo']) && isset($_POST['drink'])) {
                $nomClient = $_POST['name'];
                $plats = implode(", ", $_POST['combo']);
                $boissons = implode(", ", $_POST['drink']);
                $total = 0;

                foreach ($_POST['combo'] as $combo) {
                    if ($combo == 'vegancombo') {
                        $total += 30;
                    } elseif ($combo == 'meatcombo') {
                        $total += 45;
                    }
                }

                $uneCommande = new Commande(null, $nomClient, $plats, $boissons, $total);

                if (CommandeDAO::inserer($uneCommande)) {
                    $this->message = "Commande ajoutée avec succès.";
                } else {
                    $this->message = "Erreur lors de l'ajout de la commande.";
                }
            } else {
                $this->message = "Veuillez remplir tous les champs.";
            }
        }

        return "Commander"; 
    }
}
?>