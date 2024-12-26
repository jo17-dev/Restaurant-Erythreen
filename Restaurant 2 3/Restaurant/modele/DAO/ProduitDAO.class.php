<?php
require_once 'connexionBD.php';

class ProduitDAO {
    private $connexionBD;

    public function __construct() {
        $this->connexionBD = ConnexionDB::getInstance();
    }

    public function addPlat($nom, $description, $prix) {
        $sql = "INSERT INTO plat (nom, description, prix) VALUES (?, ?, ?)";
        $affichage = $this->connexionBD->prepare($sql);
        return $affichage->execute([$nom, $description, $prix]);
    }

    public function deletePlat($idPlat) {
        $sql = "DELETE FROM plat WHERE idPlat = ?";
        $affichage = $this->connexionBD->prepare($sql);
        return $affichage->execute([$idPlat]);
    }

    public function addBoisson($nom, $prix, $boissonCol) {
        $sql = "INSERT INTO boisson (nom, prix, boissonCol) VALUES (?, ?, ?)";
        $affichage = $this->connexionBD->prepare($sql);
        return $affichage->execute([$nom, $prix, $boissonCol]);
    }

    public function deleteBoisson($idBoisson) {
        $sql = "DELETE FROM boisson WHERE idBoisson = ?";
        $affichage = $this->connexionBD->prepare($sql);
        return $affichage->execute([$idBoisson]);
    }

    public function addDessert($nom, $description, $prix) {
        $sql = "INSERT INTO dessert (nom, description, prix) VALUES (?, ?, ?)";
        $affichage = $this->connexionBD->prepare($sql);
        return $affichage->execute([$nom, $description, $prix]);
    }

    public function deleteDessert($idDessert) {
        $sql = "DELETE FROM dessert WHERE idDessert = ?";
        $affichage = $this->connexionBD->prepare($sql);
        return $affichage->execute([$idDessert]);
    }
}
?>