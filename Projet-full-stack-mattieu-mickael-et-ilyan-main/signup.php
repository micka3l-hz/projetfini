<?php
// Démarrer la session
session_start();

// Connexion à la base de données
$servername = "localhost";
$username = "root"; // Remplacez par vos identifiants
$password = "root"; // Remplacez par votre mot de passe
$dbname = "portfolio"; // Nom de la base de données

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Si la requête est POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assainir les entrées
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Vérifier si les mots de passe correspondent
    if ($password !== $confirm_password) {
        echo "<script>alert('Les mots de passe ne correspondent pas.');</script>";
    } else {
        // Hacher le mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Vérifier si le nom d'utilisateur ou l'email existe déjà
        $sql_check = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            echo "<script>alert('Le nom d\'utilisateur ou l\'email est déjà utilisé.');</script>";
        } else {
            // Insérer les données dans la base
            $sql_insert = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

            if ($conn->query($sql_insert) === TRUE) {
                echo "<script>alert('Compte créé avec succès !');</script>";
                // Rediriger l'utilisateur vers la page de connexion
                header("Location: login.php");
                exit();
            } else {
                echo "Erreur : " . $sql_insert . "<br>" . $conn->error;
            }
        }
    }
}

// Fermer la connexion
$conn->close();
?>
