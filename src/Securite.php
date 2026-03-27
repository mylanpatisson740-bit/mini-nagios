<?php
namespace App;

class Securite
{
    public static function verifierConnexion(): void
    {
        session_start();

        if (!isset($_SESSION['admin_id'])) {
            header("Location: login.php");
            exit();
        }


    }


}