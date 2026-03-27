<?php
require '../vendor/autoload.php';
use App\Serveur;
use App\Database;
use App\ServeurRepository;
use App\Securite;

App\Securite::verifierConnexion();


$dt=Database::getConnection();


$serVeur=new ServeurRepository($dt);

$repos=$serVeur->listerTous();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord - MiniNagios</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h1>Tableau de Bord des Serveurs</h1>

    <a href="ajouter_machine.php"><button>Ajouter un nouveau serveur</button></a>
    <br><br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Hostname</th>
                <th>IP</th>
                <th>OS</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($repos as $srv): ?>
            <tr>
                <td><?= $srv['id'] ?></td>
                <td><?= $srv['hostname'] ?></td>
                <td><?= $srv['ip'] ?></td>
                <td><?= $srv['os'] ?></td>
                <td><?= $srv['date_creation'] ?></td>
                <td><a href="supprimer.php?id=<?= $srv['id'] ?>">Supprimer</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>