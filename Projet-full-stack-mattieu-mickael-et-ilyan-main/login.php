<?php
// Démarrage de la session au début du fichier pour éviter l'erreur des headers déjà envoyés
session_start();

// Inclure les fichiers nécessaires pour la connexion à la base de données et les variables
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Login / Inscription</title>
    <style>
        /* Basic styling for the form */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .form-toggle {
            text-align: center;
            margin-top: 20px;
        }

        .form-toggle a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }

        .form-toggle a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        // JavaScript validation for the login form
        function validateLoginForm() {
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;

            if (username.trim() === "" || password.trim() === "") {
                alert("Veuillez remplir tous les champs.");
                return false;
            }

            return true;
        }

        // JavaScript validation for the signup form
        function validateSignupForm() {
            const username = document.getElementById("signup_username").value;
            const email = document.getElementById("signup_email").value;
            const password = document.getElementById("signup_password").value;
            const confirmPassword = document.getElementById("signup_confirm_password").value;

            if (username.trim() === "" || email.trim() === "" || password.trim() === "" || confirmPassword.trim() === "") {
                alert("Veuillez remplir tous les champs.");
                return false;
            }

            if (password !== confirmPassword) {
                alert("Les mots de passe ne correspondent pas.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>

<div class="form-container">
    <!-- Login Form -->
    <h2>Se connecter</h2>
    <form id="form_login" action="login.php" method="POST" onsubmit="return validateLoginForm()">
        <label for="username">Nom d'utilisateur</label>
        <input id="username" name="username" type="text" required>

        <label for="password">Mot de passe</label>
        <input id="password" name="password" type="password" required>

        <button type="submit">Se connecter</button>
        <a href="https://haveibeenpwned.com/api/v3/latestbreach">
            <button>API</button>
        </a>
    </form>

    <!-- Toggle to Signup form -->
    <div class="form-toggle">
        <p>Pas encore de compte ? <a href="javascript:void(0);" onclick="toggleSignupForm()">Créer un compte</a></p>
    </div>
</div>

<!-- Signup Form (hidden by default) -->
<div class="form-container" id="signup_form" style="display:none;">
    <h2>Créer un compte</h2>
    <form id="form_signup" action="signup.php" method="POST" onsubmit="return validateSignupForm()">
        <label for="signup_username">Nom d'utilisateur</label>
        <input id="signup_username" name="username" type="text" required>

        <label for="signup_email">Email</label>
        <input id="signup_email" name="email" type="email" required>

        <label for="signup_password">Mot de passe</label>
        <input id="signup_password" name="password" type="password" required>

        <label for="signup_confirm_password">Confirmer le mot de passe</label>
        <input id="signup_confirm_password" name="confirm_password" type="password" required>

        <button type="submit">Créer le compte</button>
    </form>

    <!-- Toggle back to Login form -->
    <div class="form-toggle">
        <p>Vous avez déjà un compte ? <a href="javascript:void(0);" onclick="toggleSignupForm()">Se connecter</a></p>
    </div>
</div>

<script>
    // Function to toggle between Login and Signup forms
    function toggleSignupForm() {
        var loginForm = document.getElementById('form_login');
        var signupForm = document.getElementById('signup_form');

        if (signupForm.style.display === "none") {
            loginForm.style.display = "none";
            signupForm.style.display = "block";
        } else {
            signupForm.style.display = "none";
            loginForm.style.display = "block";
        }
    }
</script>

</body>
</html>


<form id="form_signup" action="signup.php" method="POST" onsubmit="return validateSignupForm()">
