<?php
class Commande {
    private ?int $idCommande;
    private string $nomClient;
    private string $plats;
    private string $boissons;
    private int $total;

    public function __construct(?int $idCommande, string $nomClient, string $plats, string $boissons, int $total) {
        $this->idCommande = $idCommande;
        $this->nomClient = $nomClient;
        $this->plats = $plats;
        $this->boissons = $boissons;
        $this->total = $total;
    }

  
    public function getIdCommande(): ?int {
        return $this->idCommande;
    }

 
    public function setIdCommande(?int $idCommande): self {
        $this->idCommande = $idCommande;
        return $this;
    }

   
    public function getNomClient(): string {
        return $this->nomClient;
    }

   
    public function setNomClient(string $nomClient): self {
        $this->nomClient = $nomClient;
        return $this;
    }

    public function getPlats(): string {
        return $this->plats;
    }

    public function setPlats(string $plats): self {
        $this->plats = $plats;
        return $this;
    }

    public function getBoissons(): string {
        return $this->boissons;
    }

    public function setBoissons(string $boissons): self {
        $this->boissons = $boissons;
        return $this;
    }

    public function getTotal(): int {
        return $this->total;
    }

    public function setTotal(int $total): self {
        $this->total = $total;
        return $this;
    }

    
public function __toString(): string {
    return sprintf(
        "Commande ID: %s, Client: %s, Plats: %s, Boissons: %s, Total: %d",
        $this->idCommande !== null ? $this->idCommande : 'N/A',
        $this->nomClient,
        $this->plats,
        $this->boissons,
        $this->total
    );
}
}
?>
