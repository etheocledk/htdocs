<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $identifiant = $_POST['identifiant'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);  // Hasher le mot de passe

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";  // Remplacez par le nom d'utilisateur de votre base de données
    $password_db = "";   // Remplacez par le mot de passe de votre base de données
    $database = "secureDB";                // Remplacez par le nom de votre base de données

    $conn = new mysqli($servername, $username, $password_db, $database);

    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    print_r('connexion reussie');

    // Vérifier si l'utilisateur existe déjà
    $check_user_query = $conn->prepare("SELECT id FROM user WHERE identifiant = ?");
    $check_user_query->bind_param("s", $identifiant);
    $check_user_query->execute();
    $result = $check_user_query->get_result();

    if ($result->num_rows > 0) {
        echo "Cet identifiant est déjà utilisé. Choisissez un autre.";
    } else {
        // Insérer l'utilisateur dans la base de données
        $insert_user_query = $conn->prepare("INSERT INTO users (identifiant, password) VALUES (?, ?)");
        $insert_user_query->bind_param("ss", $identifiant, $password);
        
        if ($insert_user_query->execute()) {
            echo "Inscription réussie ! Vous pouvez maintenant vous connecter.";
        } else {
            echo "Erreur lors de l'inscription. Veuillez réessayer.";
        }
    }

    $conn->close();
}
?>