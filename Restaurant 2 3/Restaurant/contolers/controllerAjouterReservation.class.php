<?php 
include_once("controleur.abstract.class.php");
include_once("modele/DAO/reservationDAO.class.php");
include_once("modele/reservation.class.php");

class AjouterReservation extends Controleur
{
    private $message;
    public $heuresDisponibles = array();
    public function __construct()
    {
        parent::__construct();
        $this->message = "";
    }
    public function getMessage(): string
    {
        return $this->message;
    }
    public function getHeuresDisponibles(): array
    {
        return $this->heuresDisponibles;
    }
    public function executerAction(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['date'])) {
                $dateChoisie = $_POST['date'];
                $heuresReservees = ReservationDAO::obtenirHeuresReservees($dateChoisie);
                $this->heuresDisponibles = array();
                for ($hour = 9; $hour < 21; $hour++) {
                    $heureFormatee = sprintf("%02d:00:00", $hour);
                    if (!in_array($heureFormatee, $heuresReservees)) {
                        $this->heuresDisponibles[] = $heureFormatee;
                    }
                }
            }
            if (isset($_POST['name'], $_POST['date'], $_POST['time'], $_POST['nombrePersonnes'])) {
                $nom = trim($_POST['name']);
                $date = trim($_POST['date']);
                $heure = trim($_POST['time']);
                $nombrePersonnes = trim($_POST['nombrePersonnes']);
            
                if (!empty($nom) && !empty($date) && !empty($heure) && !empty($nombrePersonnes)) {
                    if (ReservationDAO::verifierDisponibilite($date, $heure)) {
                        $uneReservation = new Reservation(0, $nom, $date, $heure, (int)$nombrePersonnes);
            
                        if (ReservationDAO::inserer($uneReservation)) {
                            $this->message = "succes";
                        } else {
                            $this->message = "erreur";
                        }
                    } else {
                        $this->message = "Une réservation existe déjà pour cette date et heure.";
                    }
                } 
            }
            
            
            

        } else {
            $this->heuresDisponibles = array();
        }
        return "Reservation";
    }
}
?>
