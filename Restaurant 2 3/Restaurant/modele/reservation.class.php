<?php
class Reservation {
    private ?int $idReservation;
    private string $nomClient;
    private string $dateReservation;
    private string $heure;
    private int $nombrePersonnes;

    public function __construct(?int $idReservation, string $nomClient, string $dateReservation, string $heure, int $nombrePersonnes) {
        $this->idReservation = $idReservation;
        $this->nomClient = $nomClient;
        $this->dateReservation = $dateReservation;
        $this->heure = $heure;
        $this->nombrePersonnes = $nombrePersonnes;
    }
    public function getIdReservation(): ?int {
        return $this->idReservation;
    }


    public function setIdReservation(int $idReservation): void {
        $this->idReservation = $idReservation;
    }

    public function getNomClient(): string {
        return $this->nomClient;
    }
    public function getDateReservation(): string {
        return $this->dateReservation;
    }
    public function getHeure(): string {
        return $this->heure;
    }
    public function getNombrePersonnes(): int {
        return $this->nombrePersonnes;
    }

    public function __toString(): string {
        return sprintf(
            "Reservation ID: %s, Client: %s, Date: %s, Time: %s, Number of People: %d",
            $this->idReservation !== null ? $this->idReservation : 'N/A',
            $this->nomClient,
            $this->dateReservation,
            $this->heure,
            $this->nombrePersonnes
        );
    }
}
?>
