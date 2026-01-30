<?php

namespace App;

class SwitchReseau extends EquipementReseau
{
    private int $nombrePorts = 24;

    public function __construct(string $hostname, string $ip, int $nombrePorts)
    {
        parent::__construct($hostname, $ip);
        $this->nombrePorts = $nombrePorts;
    }

    public function scannerPorts(): void
    {
        for ($i = 0; $i <= $this ->nombrePorts; $i++) {
            $rand = rand(0, 1);
            if ($rand === 0) {
                echo "<P> Port $i : <span style='color:red'> Déconnecté(Rouge) </span><BR>";
            } else echo "<P> Port $i : <span style='color:green'>Connecté(Vert) </span> <BR>";
        }
    }
}
