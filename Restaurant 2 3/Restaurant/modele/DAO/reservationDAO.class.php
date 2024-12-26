<?php
include_once("modele/reservation.class.php");
include_once("modele/DAO/connexionBD.php");

class ReservationDAO {
    public static function chercher(string $cles): ?Reservation { 
        try {
            $connexion = ConnexionDB::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
        }
        $laReservation= null; 
        
        $requete = $connexion->prepare("SELECT * FROM reservation WHERE idReservation=:id");
        $requete->bindParam(":id", $cles);  
        $requete->execute();            
        if ($requete->rowCount() > 0) {
            $enregistrement = $requete->fetch();
            $laReservation = new Reservation($enregistrement['idReservation'], $enregistrement['nomClient'], $enregistrement['dateReservation'], $enregistrement['heure'], $enregistrement['nombrePersonnes']);
        }
        $requete->closeCursor();
        ConnexionDB::close();  
    
        return $laReservation;     
    }

    public static function chercherTous(): array { 
        return self::chercherAvecFiltre("");
    }
    public static function chercherAvecFiltre(string $filtre): array { 
        try {
            $connexion = ConnexionDB::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
        }
        $liste = array(); 
                
        $requete = $connexion->prepare("SELECT * FROM reservation ".$filtre);
        $requete->execute();            

        foreach ($requete as $enregistrement) {
            $laReservation = new Reservation($enregistrement['idReservation'], $enregistrement['nomClient'], $enregistrement['dateReservation'], $enregistrement['heure'], $enregistrement['nombrePersonnes']);
            array_push($liste, $laReservation);
        }
        $requete->closeCursor();
        ConnexionDB::close();    
        
        return $liste;     
    } 
    public static function inserer(Reservation $uneReservation): bool {
        try {
            $connexion = ConnexionDB::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
        }
        $commandeSQL  = "INSERT INTO reservation (nomClient, dateReservation, heure, nombrePersonnes)";  
        $commandeSQL .=  "VALUES (?, ?, ?, ?)";
        
        $requete = $connexion->prepare($commandeSQL);
        $tab = [
            $uneReservation->getNomClient(),
            $uneReservation->getDateReservation(),
            $uneReservation->getHeure(),
            $uneReservation->getNombrePersonnes()
        ];
        return $requete->execute($tab);
    }
    public static function obtenirHeuresReservees($date): array {
        try {
            $connexion = ConnexionDB::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
        }

        $requete = $connexion->prepare("SELECT heure FROM reservation WHERE dateReservation = :date");
        $requete->bindParam(":date", $date);
        $requete->execute();

        $heuresReservees = $requete->fetchAll(PDO::FETCH_COLUMN, 0);

        $requete->closeCursor();
        ConnexionDB::close();

        return $heuresReservees;
    }
    public static function verifierDisponibilite($date, $heure): bool {
        try {
            $connexion = ConnexionDB::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD."); 
        }
    
        $requete = $connexion->prepare("SELECT COUNT(*) FROM reservation WHERE dateReservation = :date AND heure = :heure");
        $requete->bindParam(":date", $date);
        $requete->bindParam(":heure", $heure);
        $requete->execute();
    
        $count = $requete->fetchColumn();
    
        $requete->closeCursor();
        ConnexionDB::close();
    
        return $count == 0; // Возвращает true, если нет записей
    }
    
}
?>
