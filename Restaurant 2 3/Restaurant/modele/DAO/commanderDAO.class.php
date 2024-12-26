<?php
include_once(__DIR__ . '/../commander.class.php');
include_once(__DIR__ . '/connexionBD.php');


class CommandeDAO {
    public static function chercher(string $cles): ?Commande {
        try {
            $connexion = ConnexionDB::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        $laCommande = null;

        $requete = $connexion->prepare("SELECT * FROM commande WHERE idCommande=:id");
        $requete->bindParam(":id", $cles);
        $requete->execute();
        if ($requete->rowCount() > 0) {
            $enregistrement = $requete->fetch();
            $laCommande = new Commande($enregistrement['idCommande'], $enregistrement['nomClient'],  $enregistrement['plats'], $enregistrement['boissons'], $enregistrement['total']);
        }
        $requete->closeCursor();
        ConnexionDB::close();

        return $laCommande;
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

        $requete = $connexion->prepare("SELECT * FROM commande " . $filtre);
        $requete->execute();
        foreach ($requete as $enregistrement) {
            $laCommande = new Commande($enregistrement['idCommande'], $enregistrement['nomClient'],  $enregistrement['plats'], $enregistrement['boissons'], $enregistrement['total']);
            array_push($liste, $laCommande);
        }
        $requete->closeCursor();
        ConnexionDB::close();

        return $liste;
    }

    public static function inserer(Commande $uneCommande): bool {
        try {
            $connexion = ConnexionDB::getInstance();
        } catch (Exception $e) {
            throw new Exception("Impossible d’obtenir la connexion à la BD.");
        }
        $commandeSQL = "INSERT INTO commande (nomClient, plats, boissons, total) VALUES (?, ?, ?, ?)";

        $requete = $connexion->prepare($commandeSQL);
        $tab = [
            $uneCommande->getNomClient(),
            $uneCommande->getBoissons(),
            $uneCommande->getTotal(),
            $uneCommande->getPlats()
        ];
        return $requete->execute($tab);
    }
}
?>