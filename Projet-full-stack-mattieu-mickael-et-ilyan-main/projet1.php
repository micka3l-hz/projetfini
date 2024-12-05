<?php
// Connexion à la base de données et définition de l'encodage
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');

// Exemple de tableau avec des projets (cette partie peut être extraite de votre base de données)
$projet = [
    0 => [
        'titre' => 'Audit de sécurité du site Phoenix',
        'description' => "Dans ce projet, j'ai réalisé une simulation d'attaque sur le site de Phoenix, afin d'identifier des failles de sécurité critiques et de proposer des solutions pour renforcer la sécurité du site.",
    ],
    1 => [
        'titre' => 'Développement du site e-commerce Xpress',
        'description' => "Le projet consistait à développer un site de e-commerce pour Xpress, en intégrant des tests de pénétration et des solutions de sécurité pour protéger les données des utilisateurs et des transactions.",
    ],
    // Ajoutez d'autres projets ici si nécessaire
];

session_start();

// Si la connexion est réussie, enregistrer le nom d'utilisateur dans la session
if (isset($login_successful) && $login_successful) {
    $_SESSION['username'] = $username;
}

if (isset($_POST['logout'])) {
    session_unset(); 
    session_destroy(); 
    header("Location: " . $_SERVER['PHP_SELF']); 
    exit();
}
?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
    <title>Thiago Projet 1</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">
    <div id="wrapper">

        <header id="header">
            <div>
            <?php if (isset($_SESSION['username'])): ?>
                <p>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?> !</p>
            <?php endif; ?>
                <h1><?php echo $projet[1]['titre']; ?></h1>
                <h2><?php echo $projet[1]['description']; ?></h2>
            </div>
        </header>

        <!-- Bouton "Home" qui revient à la page précédente -->
        <div style="text-align: center; margin-top: 20px;">
            <button class="btn" onclick="goBack()">home</button>
        </div>

        <script>
            function goBack() {
                window.history.back();
            }
        </script>

    </div>

    <!-- Inclusion des scripts JavaScript -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
