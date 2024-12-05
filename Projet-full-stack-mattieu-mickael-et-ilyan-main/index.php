<?php
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');

session_start();

if ($login_successful) {
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="Portfolio de Thiago Torres, expert en cybersécurité et tests d'intrusion." />
    <title>Portfolio - Thiago Torres</title>
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>

<body class="is-preload">
    <div id="wrapper">
        <!-- Header -->
        <header id="header">
            <div>
                <?php if (isset($_SESSION['username'])): ?>
                    <p>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?> !</p>
                <?php endif; ?>
                <div>
                    <?php if (isset($_SESSION['username'])): ?>
                        <p>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?> !</p>
                        <a href="logout.php" class="btn btn-danger">Se déconnecter</a>
                    <?php else: ?>
                        <p>Vous n'êtes pas connecté.</p>
                        <a href="login.php" class="btn btn-primary">Se connecter</a>
                    <?php endif; ?>
                </div>
                <img src="terres_tolue_12078.webp" width="400" height="341" alt="Thiago Torres - Cybersécurité" />
                <div class="content">
                    <div class="inner">
                        <h1>Thiago Torres</h1>
                        <p>Portfolio de Thiago Torres - Expert en Cybersécurité</p>
                    </div>
                </div>
                <nav>
                    <ul>
                        <li><a href="#MOI">MOI</a></li>
                        <li><a href="#PROJET">PROJETS</a></li>
                        <li><a href="#PARCOURS">PARCOURS</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        
                    </ul>
                </nav>
            </div>
        </header>

        <div id="main">
            <!-- Section MOI -->
            <article id="MOI">
                <h2 class="major">MOI</h2>
                <span class="image main"><img src="tiagoooo.png" alt="Thiago Torres - Cybersécurité" /></span>
                <p>Je suis Thiago Torres, expert en cybersécurité spécialisé en tests d'intrusion (<a href="https://foxeet.fr/contenu/article-qu-est-ce-qu-un-pentest">pentest</a>). Avec plusieurs années d'expérience, je réalise des audits de sécurité pour identifier et exploiter les vulnérabilités des systèmes informatiques, des réseaux et des applications. Grâce à une approche méthodique et des outils de pointe, je propose des recommandations concrètes pour renforcer la sécurité et prévenir les attaques. Titulaire de certifications reconnues telles que <a href="https://openclassrooms.com/fr/">OSCP</a> et <a href="https://www.cyberuniversity.com/post/ceh-certified-ethical-hacker-definition-et-comment-lobtenir">CEH</a>, mon objectif est d'aider les entreprises à anticiper les menaces en simulant des cyberattaques réelles et en fournissant des solutions pour sécuriser efficacement leurs infrastructures.</p>
            </article>

            <!-- Section PARCOURS -->
            <article id="PARCOURS">
                <h2 class="major">PARCOURS</h2>
                <span class="image main"><img src="Cyber-Security_Banner.jpg" alt="Mon Parcours" /></span>
                <p>Après un baccalauréat scientifique avec spécialisation en informatique, j'ai poursuivi une licence en informatique à l'Université de Paris, où ma passion pour la cybersécurité s'est confirmée. En troisième année, j'ai choisi de me spécialiser et ai intégré un Master en sécurité des systèmes d'information. J'y ai acquis des compétences en gestion des risques, tests de pénétration, et sécurité des réseaux et applications. Pour valider mes compétences pratiques, j'ai obtenu des certifications professionnelles telles que OSCP et Certified Ethical Hacker (CEH). J'ai également effectué un stage de six mois dans une entreprise de cybersécurité, où j'ai participé à la sécurisation des systèmes d'information et à des audits de sécurité. Aujourd'hui, fort de trois ans d'expérience, je souhaite approfondir mes compétences avec des certifications avancées telles que le CISSP et m'orienter vers des rôles stratégiques, notamment en tant que Responsable de la sécurité des systèmes d'information (RSSI), pour élaborer des politiques de sécurité et protéger les infrastructures contre les menaces émergentes. Mon objectif est de diriger une équipe dédiée à la gestion des risques et à la cybersécurité dans une organisation internationale.</p>
            </article>

            <!-- Section PROJETS -->
            <article id="PROJET">
                <h2 class="major">PROJETS</h2>
                <span class="image main"><img src="APIXIT-cybersecurite-SASE-SSE-1024x585.jpg" alt="Projets Cybersécurité" /></span>
                <p>
                    <a href="projet1.php">Projet 1</a><br>
                    <a href="projet2.php">Projet 2</a><br>
                    <a href="projet3.php">Projet 3</a><br>
                    <a href="projet4.php">Projet 4</a><br>
                </p>
            </article>

            <!-- Section Contact -->
            <article id="contact">
                <h2 class="major">Contact</h2>
                <form method="post" action="#">
                    <div class="fields">
                        <div class="field half">
                            <label for="name">Nom</label>
                            <input type="text" name="name" id="name" required />
                        </div>
                        <div class="field half">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" required />
                        </div>
                        <div class="field">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" rows="4" required></textarea>
                        </div>
                    </div>
                    <ul class="actions">
                        <li><input type="submit" value="Envoyer le message" class="primary" /></li>
                        <li><input type="reset" value="Réinitialiser" /></li>
                    </ul>
                </form>
                <ul class="icons">
                    <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
                </ul>
            </article>
        </div>

        <!-- Footer -->
        <footer id="footer">
            <!-- Ajoutez ici des informations supplémentaires si nécessaire -->
        </footer>
    </div>

    <!-- BG -->
    <div id="bg"></div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
