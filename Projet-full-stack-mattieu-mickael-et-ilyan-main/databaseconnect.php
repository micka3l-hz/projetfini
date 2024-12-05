<?php
// Paramètres de connexion à la base de données
$host = 'localhost';  // Serveur MySQL local
$username = 'root';   // Nom d'utilisateur MySQL
$password = 'root';   // Mot de passe MySQL
$database = 'portfolio';  // Nom de la base de données

// Création de la connexion MySQL
$mysqlClient = new mysqli($host, $username, $password, $database);

// Vérification de la connexion
if ($mysqlClient->connect_error) {
    die("Connection failed: " . $mysqlClient->connect_error);  // Affiche l'erreur si la connexion échoue
}
echo "Connexion réussie à la base de données '$database'";  // Message de succès
?>
