<!DOCTYPE html>
<?php
session_start();
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue dans l’application de gestion des absences</title>
</head>
<body>
<?php
$message = '';

if (empty($_POST['identifiant']) || empty($_POST['password'])) {
    $message = '<p>Vous devez remplir tous les champs</p>
                <p>Cliquez <a href="./index.php">ici</a> pour essayer de nouveau.</p>';
} else {
    $servername = "localhost";
    $username = "votre_nom_utilisateur";  // Remplacez par le nom d'utilisateur de votre base de données
    $password = "votre_mot_de_passe";      // Remplacez par le mot de passe de votre base de données
    $database = "secureDB";                // Remplacez par le nom de votre base de données

    // Création d'une connexion
    $conn = new mysqli($servername, $username, $password, $database);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Utiliser une requête préparée pour éviter les injections SQL
    $sql = $conn->prepare("SELECT id, name FROM user WHERE identifiant = ?");
    $sql->bind_param("s", $_POST['identifiant']);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['identifiant'] = $user['identifiant'];

        $message = "<p>Bienvenue " . $user['identifiant'] . ", vous êtes maintenant connecté!</p>";
    } else {
        $message = '<p>Une erreur d\'authentification s\'est produite ! </p>';
    }
    $conn->close();
    echo $message;
}
?>
<form id="login" action="index.php" method="post">
    <h1>Connexion</h1>
    <fieldset id="information">
        <input id="username" type="text" name="identifiant" placeholder="Votre identifiant" autofocus required>
        <input id="password" type="password" name="password" placeholder="Votre mot de passe" required>
    </fieldset>
    <fieldset id="action">
        <input type="submit" id="submit" value="Connexion">
    </fieldset>
</form>
</body>
</html>
