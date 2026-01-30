<?php
namespace App;

class Imprimante extends EquipementReseau
{
    private string $type;

    private bool $estCouleur;

    public function __construct(string $hostname, string $ip, string $type, bool $estCouleur)
    {
        parent::__construct($hostname, $ip);
        $this->type = $type;
        $this->estCouleur = $estCouleur;


    }

    public function afficherStatut(): string
    {
        $afficheCouleur = "Non";
        if ($this ->estCouleur)
            $afficheCouleur ="Oui";
        return parent::afficherStatut() . " | Type : $this->type"."| Couleur : $afficheCouleur";
    }


}