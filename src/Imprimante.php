<?php
namespace App;

class Imprimante extends EquipementReseau
{
    private string $laser;

    private bool $estCouleur;

    public function __construct(string $hostname, string $ip, string $laser, bool $estCouleur)
    {
        parent::__construct($hostname, $ip);
        $this->laser = $laser;
        $this->estCouleur = $estCouleur;


    }

    public function afficherStatut(): string
    {
        // On récupère le texte du parent et on ajoute l'OS
        return parent::afficherStatut() . " | laser : $this->laser"."| estCouleur : $this->estCouleur";
    }


}