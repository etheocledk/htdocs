<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form action="./inscription.php" method="post">
        <label for="identifiant">email:</label>
        <input type="email" id="identifiant" name="identifiant" required>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>
