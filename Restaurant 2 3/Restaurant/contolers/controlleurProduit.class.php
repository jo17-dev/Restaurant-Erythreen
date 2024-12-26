<?php

require_once '../modele/DAO/ProduitDAO.class.php';
require_once 'controleur.abstract.class.php';

class ProduitController {
    private $produitDAO;

    public function __construct() {
        $this->produitDAO = new ProduitDAO();
    }

    public function addPlat($nom, $description, $prix) {
        return $this->produitDAO->addPlat($nom, $description, $prix);
    }

    public function deletePlat($idPlat) {
        return $this->produitDAO->deletePlat($idPlat);
    }

    public function addBoisson($nom, $prix, $boissonCol) {
        return $this->produitDAO->addBoisson($nom, $prix, $boissonCol);
    }

    public function deleteBoisson($idBoisson) {
        return $this->produitDAO->deleteBoisson($idBoisson);
    }

    public function addDessert($nom, $description, $prix) {
        return $this->produitDAO->addDessert($nom, $description, $prix);
    }

    public function deleteDessert($idDessert) {
        return $this->produitDAO->deleteDessert($idDessert);
    }
}
?>