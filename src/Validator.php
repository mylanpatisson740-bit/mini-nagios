<?php
namespace App;

class Validator
{
    /**
     * Vérifie si une chaîne ressemble à une IP v4 valide.
     * Cette méthode est STATIQUE (mot clé static).
     * On l'appelle directement par la Classe, pas par un objet.
     */
    public static function isIpValid(string $ip): bool
    {
        // filter_var est une fonction native de PHP très puissante pour la sécurité
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            return true;
        } else {
            return false;
        }
    }
}