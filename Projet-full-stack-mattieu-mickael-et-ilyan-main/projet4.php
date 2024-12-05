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
    2 => [
        'titre' => 'Refonte de l\'interface utilisateur du site WebZ',
        'description' => "Dans ce projet, j'ai travaillé sur la refonte complète de l'interface utilisateur du site WebZ, afin de rendre le site plus moderne, accessible et convivial pour les utilisateurs.",
    ],
    3 => [
        'titre' => 'Développement d\'une application mobile pour HealthTrack',
        'description' => "Le projet consistait à créer une application mobile pour HealthTrack, permettant aux utilisateurs de suivre leur santé en temps réel, avec des fonctionnalités de suivi de la condition physique et des rappels de médicaments.",
    ],
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
        <title><?php echo $projet[3]['titre']; ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    </head>
    <body class="is-preload">
        <div id="wrapper">

            <header id="header">
                <div>
                    <!-- Titre dynamique -->
                    <h1><?php echo $projet[3]['titre']; ?></h1>
                    <!-- Description dynamique -->
                    <h2><?php echo $projet[3]['description']; ?></h2>

                    <style>
                        .btn {
                            padding: 10px 20px;
                            font-size: 16px;
                            color: white;
                            background-color: #383737;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                        }
                        .btn:hover {
                            background-color: #19191a;
                        }
                    </style>

                    <!-- Bouton pour revenir à la page précédente -->
                    <button class="btn" onclick="goBack()">home</button>

                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script>
                </div>
            </header>

        </div>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/browser.min.js"></script>
        <script src="assets/js/breakpoints.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
