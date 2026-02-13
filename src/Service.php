<?php
namespace App;

class Service
{
    private string $nom;
    private int $port;
    private bool $estDemarre; // État du service (Allumé/Éteint)

    private bool $estCritique;

    public function __construct(string $nom, int $port, bool $estCritique)
    {
        // Petit rappel de la Séance 2 : Validation !
        if ($port < 1 || $port > 65535) {
            throw new \Exception("SERVICE : Le port $port est invalide.");
        }

        $this->nom = $nom;
        $this->port = $port;
        $this->estDemarre = false; // Par défaut, un service est éteint
        $this->estCritique = $estCritique;
    }

    public function estCritique(): bool
    { return $this ->estCritique;
    }


    public function estDemarre(): bool
    { return $this -> estDemarre;
    }


    public function demarrer(): void
    {
        $this->estDemarre = true;
    }

    public function arreter(): void
    {
        $this->estDemarre = false;
    }

    public function getStatut(): string
    {
        // Retourne un bout de HTML (Rouge ou Vert)
        $couleur = $this->estDemarre ? "green" : "red";
        $etat    = $this->estDemarre ? "ON" : "OFF";

        return "<span style='color:$couleur'>[$this->nom : $etat : Port $this->port]</span>";
    }
}