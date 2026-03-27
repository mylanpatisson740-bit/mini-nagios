
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: sans-serif; padding: 20px; max-width: 600px; margin: auto;}
        label { display:block; margin-top: 15px; font-weight: bold;}
        input, select { margin-bottom: 10px; padding: 8px; width: 100%; display:block; box-sizing: border-box;}
        button { padding: 10px 20px; background: #28a745; color: white; border: none; cursor: pointer; width: 100%; font-size: 1.1em;}
        button:hover { background: #218838; }
    </style>
</head>
<body>
<h2>Connexion</h2>


<form method="POST" action="traitement_login.php">
    <label>Email :</label>
    <input type="text" name="email" required placeholder="Ex: Lolo@gmail.com">

    <label>Mot de passe</label>
    <input type="text" name="password">
    <button type="submit">Se connecter</button>
</form>
</body>
</html>