<?php

// Définir l'URL de base de l'API
$baseUrl = "https://www.demonslayer-api.com/api/v1/characters";

// Définir les paramètres de la requête (page et limite)
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = isset($_GET['limit']) ? $_GET['limit'] : 5;

// Construire l'URL complète avec les paramètres
$url = $baseUrl . "?limit=" . $limit . "&page=" . $page;

// Initialiser cURL


// Définir les options cURL


// Exécuter la requête


// Gérer les erreurs cURL

// Fermer la session cURL
curl_close($ch);

// Décoder le JSON
$data = json_decode($response, true);

// Afficher les données
if ($data) {
    echo "<h2>Personnages Demon Slayer (Page : " . $page . ", Limite : " . $limit . ")</h2>";
    echo "<pre>" . json_encode($data, JSON_PRETTY_PRINT) . "</pre>";


    //  Alternativement, afficher les données dans un tableau HTML :
    // echo "<table border='1'>";
    // echo "<tr><th>Nom</th><th>Image</th></tr>";
    // foreach ($data as $character) {
    //     echo "<tr>";
    //     echo "<td>" . $character['name'] . "</td>";
    //     echo "<td><img src='" . $character['images']['jpg']['image_url'] . "' width='100'></td>";
    //     echo "</tr>";
    // }
    // echo "</table>";


} else {
    echo "Erreur : Impossible de récupérer les données de l'API.";
}

?>