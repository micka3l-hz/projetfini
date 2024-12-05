-- Assurez-vous de supprimer les tables existantes avant de les recréer.
DROP TABLE IF EXISTS `login`;  -- Suppression de la table 'login'
DROP TABLE IF EXISTS `projet`; -- Suppression de la table 'projet'
DROP TABLE IF EXISTS `users`;  -- Suppression de la table 'users'

-- Création de la base de données et sélection de l'utilisation de celle-ci
CREATE DATABASE IF NOT EXISTS `portfolio`;
USE `portfolio`;

-- Structure de la table `projet`
CREATE TABLE `projet` (
  `id` INTEGER AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `description` text,
  `categorie` varchar(100) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `equipe` varchar(100) DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `budget_amount` decimal(10,2) DEFAULT NULL,
  `budget_devise` varchar(10) DEFAULT NULL,
  `client` varchar(255) DEFAULT NULL,
  `technologies` text,
  `resultat` text,
  `commentaires` text,
  `responsable` varchar(255) DEFAULT NULL,
  `duree_estimee` int(11) DEFAULT NULL,
  `complexite` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Création de la table `login`
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) 
);

-- Création de la table `users` (si elle n'existe pas déjà)
CREATE TABLE IF NOT EXISTS `users` (
    `user_id` INT AUTO_INCREMENT PRIMARY KEY,   -- Identifiant unique de l'utilisateur
    `username` VARCHAR(50) NOT NULL UNIQUE,      -- Nom d'utilisateur unique
    `email` VARCHAR(100) NOT NULL UNIQUE,        -- Email unique
    `password` VARCHAR(255) NOT NULL,            -- Mot de passe haché
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Date de création du compte
);

-- Insertion des projets dans la table `projet`
INSERT INTO `projet` (titre, `description`, categorie, date_debut, date_fin, equipe, statut, duree, budget_amount, budget_devise, client, technologies, resultat, commentaires, responsable, duree_estimee, complexite) 
VALUES
('Audit de sécurité du site Phoenix', "Dans ce projet, j'ai réalisé une simulation d'attaque sur le site de Phoenix, afin d'identifier des failles de sécurité critiques et de proposer des solutions pour renforcer la sécurité du site.", 'Sécurité', '2023-07-01', '2023-08-15', 'Equipe C', 'Terminé', 45, '20000.00', 'USD', 'Phoenix', 'Metasploit, Wireshark, Nessus', 'Vulnérabilités corrigées', 'Audit complet et sécurisation du site', 'Jean-Claude Moreau', 30, 'Élevée'),
('Développement du site e-commerce Xpress', 'Le projet consistait à développer un site de e-commerce pour Xpress, en intégrant des tests de pénétration et des solutions de sécurité pour protéger les données des utilisateurs et des transactions.', 'Développement', '2023-09-01', '2023-12-15', 'Equipe D', 'En cours', 100, '35000.00', 'USD', 'Xpress', 'React, Node.js, Pentest', 'Site en production', 'Tests de sécurité continus', 'Sophie Lefevre', 45, 'Très élevée'),
('Migration et sécurisation du site Globex', 'Migration du site de Globex vers une nouvelle infrastructure cloud avec une attention particulière à la sécurité des données et des communications. Un audit de sécurité a été effectué tout au long de la migration.', 'Sécurité', '2023-05-20', '2023-06-10', 'Equipe E', 'Terminé', 21, '15000.00', 'EUR', 'Globex', 'AWS, SSL/TLS, Docker', "Sécurisation de l'infrastructure cloud", 'Migration réussie avec tests de sécurité', 'Marc Dupuis', 14, 'Modérée'),
('Renforcement de la sécurité sur le site Web SecureShop', "Audit de sécurité et mise en place de mesures de protection supplémentaires pour le site de e-commerce SecureShop. Le projet a impliqué l'analyse des menaces et la mise à jour des systèmes de sécurité pour prévenir les cyberattaques.", 'Sécurité', '2023-06-05', '2023-06-30', 'Equipe F', 'Terminé', 25, '12000.00', 'EUR', 'SecureShop', 'OWASP, XSS, SQL Injection', 'Amélioration continue de la sécurité', 'Tests de pénétration intensifs', 'Nicolas Girard', 20, 'Modérée');
