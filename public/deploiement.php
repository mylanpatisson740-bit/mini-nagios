<?php
namespace App;
require '../vendor/autoload.php';

// 2. Importation des classes qu'on veut utiliser

use App\Serveur;
use App\Service;



$Jolo = new Serveur ("SRV-WEB-01","172.32.50.12","Debian12");
$Polo = new Serveur ("SRV-DB-01","172.32.64.25","Windows");

$apache = new Service("Apache",80,true);
$ssh = new Service("SSH",22,false);

$MySQl = new Service("MySQL",3306,false);
$RDP = new Service("RDP",3389,false);

$apache ->demarrer();
$Polo ->ajouterService($MySQl);
$Polo ->ajouterService($RDP);
echo $Polo->afficherStatut();
echo "<BR>";


$Jolo ->ajouterService($apache);
$Jolo ->ajouterService($ssh);
$MySQl->demarrer();


echo $Jolo->afficherStatut();
echo "<BR>";
