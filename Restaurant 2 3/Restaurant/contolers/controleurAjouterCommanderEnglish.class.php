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
                $clientName = $_POST['name'];
                $dishes = implode(", ", $_POST['combo']);
                $drinks = implode(", ", $_POST['drink']);
                $total = 0;

                foreach ($_POST['combo'] as $combo) {
                    if ($combo == 'vegancombo') {
                        $total += 30;
                    } elseif ($combo == 'meatcombo') {
                        $total += 45;
                    }
                }

                $order = new Commande(null, $clientName, $dishes, $drinks, $total);

                if (CommandeDAO::inserer($order)) {
                    $this->message = "Order added successfully.";
                } else {
                    $this->message = "Error adding the order.";
                }
            } else {
                $this->message = "Please fill in all fields.";
            }
        }

        return "CommanderEnglish"; 
    }
}
?>