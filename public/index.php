<?php
// 1. Chargement automatique des classes (Grâce à Composer)
require '../vendor/autoload.php';
// Appel d'une méthode statique avec "::" (Les deux points Paamayim Nekudotayim)
// Pas de "new Validator()", c'est inutile !

/*$ipTest = "999.0.0.1";
if (App\Validator::isIpValid($ipTest)) {
    echo "IP Valide";
} else {
    echo "IP Invalide (Sécurité activée)";
}*/

// 2. Importation des classes qu'on veut utiliser
use App\Imprimante;
use App\Serveur;
use App\Routeur;
use App\SwitchReseau;
try {

// 3. Instanciation des objets
// On crée des objets concrets avec le mot clé "new"
$monServeurWeb = new Serveur("SRV-WEB-01", "192.168.1.10", "Debian 12");
$monServeurAD  = new Serveur("SRV-AD-01", "192.168.1.11", "Windows Server 2022");
$monRouteur    = new Routeur("RTR-CORE", "10.0.0.1", 24);
$monImprimanteHP = new Imprimante("HP-ETAGE-1", "10.0.0.1","Laser",false );
$ImprimanteCanon = new Imprimante("Canon-Direction", "10.0.0.9","Jet d'encre",true );
$Switch = new SwitchReseau("SW-PRINCIPAL", "192.168.2.1",24);
// 4. Utilisation des objets
echo "<h1>Tableau de bord Mini-Nagios</h1>";

echo "<p>" . $monServeurWeb->afficherStatut() . "</p>";
echo "<p>" . $monServeurAD->afficherStatut() . "</p>";
echo "<p>" . $monRouteur->afficherStatut() . "</p>";
echo "<p>" . $ImprimanteCanon->afficherStatut() . "</p>";
echo "<p>" . $monImprimanteHP->afficherStatut() . "</p>";
echo "<p>" . $Switch->scannerPorts() . "</p>";
// Debug pour voir la structure réelle de l'objet
echo "<pre>";
var_dump($monServeurWeb);
echo "</pre>";


echo "<h1>Console de Supervision</h1>";

    // ON ESSAYE (TRY) d'exécuter ce code dangereux

    $srvWeb = new Serveur("SRV-WEB", "192.168.1.10", "Debian");
    echo "<div style='color:green'>✅ " . $srvWeb->afficherStatut() . "</div>";

    // Tentative de création avec erreur
    echo "Tentative de création du serveur corrompu...<br>";
    $srvBad = new Serveur("SRV-BAD", "999.999.999.999", "Windows");
    // La ligne ci-dessous ne sera JAMAIS exécutée car ça plante juste avant
    echo "Ce message ne s'affichera pas.";

} catch (Exception $e) {
    // SI UNE ERREUR SURVIENT, on tombe ici
    // $e contient les infos sur l'erreur
    echo "<div style='background-color:#ffcccc; padding:10px; border:1px solid red; margin:10px;'>";
    echo "<strong>🛑 ALERTE SYSTÈME :</strong> " . $e->getMessage();
    echo "</div>";
}

echo "<p>Le script continue normalement après l'erreur...</p>";