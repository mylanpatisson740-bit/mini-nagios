<?php
use App\Database;

require '../vendor/autoload.php';

session_start();


$email = $_POST['email'];
$password = $_POST['password'];

$admin = getAdminByEmail($email);


if ($admin && password_verify($_POST["password"], $admin['password_hash'])) {

    $_SESSION['admin_id'] = $admin['id'];

    header('Location: dashboard.php?success=1');
    exit();

} else {

    header('Location: login.php?erreur=1');
    exit();
}



function getAdminByEmail($email) {

    // Connexion à la base de données
    $pdo = Database::getConnection();

    // Préparer la requête
    $stmt = $pdo->prepare("SELECT * FROM administrateurs WHERE email = ?");

    // Exécuter avec l'email
    $stmt->execute([$email]);

    // Récupérer le résultat
    $admin = $stmt->fetch();

    return $admin;


}