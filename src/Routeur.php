<?php
namespace App;

class Routeur extends EquipementReseau
{
    protected int $nbPorts;

    public function __construct(string $hostname, string $ip, int $nbPorts)
    {
        if ($nbPorts<1 ||$nbPorts>128) {
            // Si le nombre de ports est trop petit ou trop grand
            throw new \Exception("ERREUR MATERIELLE : Le nombre de port n'est pas valide '$nbPorts' n'est pas valide !");
        }

        parent::__construct($hostname, $ip);
        $this->nbPorts = $nbPorts;
    }

    public function afficherStatut(): string
    {
        return parent::afficherStatut() . " | Ports : $this->nbPorts";
    }
}