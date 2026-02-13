<?php
require "../vendor/autoload.php";

use App\Service;
use App\Serveur;

$Jolo = new Serveur("SRV-WEB-01", "192.168.1.1", "Debian");
$apache = new Service("Apache", 80, true);
$ssh = new Service("SSH", 22, false);

$apache->demarrer();
$Jolo->ajouterService($apache);
$Jolo->ajouterService($ssh);

echo "Vérification statut: <BR>" ;
echo $Jolo->afficherStatut();
echo "<BR> Vérification Santé: <BR>" ;
echo $Jolo->verifierSante() ;


$apache->arreter();
echo "Vérification statut: <BR>" ;
echo $Jolo->afficherStatut();
echo "<BR> Vérification Santé: <BR>" ;

echo $Jolo->verifierSante() ;

echo "<BR>" ;