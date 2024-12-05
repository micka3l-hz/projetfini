<?php
// Démarrage de la session au début du fichier pour éviter l'erreur des headers déjà envoyés
session_start();

// Inclure les fichiers nécessaires pour la connexion à la base de données et les variables
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');

// Démarrer la session
session_start();

// Détruire toutes les variables de session
session_unset();

// Détruire la session
session_destroy();

// Rediriger vers la page d'accueil ou de connexion
header("Location: index.php");
exit();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page avec Déconnexion</title>
</head>
<body>
    <!-- Formulaire de déconnexion -->
    <form action="logout.php" method="post">
        <button type="submit">Se déconnecter</button>
    </form>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: login.php");
    exit();
}
?>
