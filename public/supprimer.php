<?php
require '../vendor/autoload.php';
use App\Database;
use App\ServeurRepository;




    if (isset($_GET['id'])) {


        $db = Database::getConnection();
        $repo = new ServeurRepository($db);


        $id = $_GET['id'];
        $repo->supprimerParId($id);
    }

header('Location: dashboard.php');
exit;