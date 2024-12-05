<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', 'root', 'portfolio');

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Préparation de la requête
$query = "SELECT id, titre, description, categorie, date_debut, date_fin, equipe, statut, duree, budget_amount, 
          budget_devise, client, technologies, resultat, commentaires, responsable, duree_estimee, complexite FROM projet";

$stmt = $conn->prepare($query);

// Vérification si la préparation de la requête a échoué
if ($stmt === false) {
    die("Erreur de préparation de la requête : " . $conn->error);
}

// Exécution de la requête
$stmt->execute();

// Lier les résultats à des variables
$stmt->bind_result(
    $id, $titre, $description, $categorie, $date_debut, $date_fin, $equipe, $statut, $duree, $budget_amount, 
    $budget_devise, $client, $technologies, $resultat, $commentaires, $responsable, $duree_estimee, $complexite
);

// Récupérer les résultats
$results = [];
while ($stmt->fetch()) {
    $results[] = [
        'id' => $id,
        'titre' => $titre,
        'description' => $description,
        'categorie' => $categorie,
        'date_debut' => $date_debut,
        'date_fin' => $date_fin,
        'equipe' => $equipe,
        'statut' => $statut,
        'duree' => $duree,
        'budget_amount' => $budget_amount,
        'budget_devise' => $budget_devise,
        'client' => $client,
        'technologies' => $technologies,
        'resultat' => $resultat,
        'commentaires' => $commentaires,
        'responsable' => $responsable,
        'duree_estimee' => $duree_estimee,
        'complexite' => $complexite
    ];
}

// Affichage des résultats
echo "<pre>";
// print_r($results);
echo "</pre>";

// Fermeture de la déclaration et de la connexion
$stmt->close();
$conn->close();
?>

