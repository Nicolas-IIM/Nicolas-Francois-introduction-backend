<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vélib IDF</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
    <div class="logo">
        <img src="./img/logo_idfm.svg" alt="logo">
    </div>
    <div class="menu">
        <a class="link-head">Recherche ID station</a>
    </div>
</div>

<div class="banner">
    <div class="txt">
        <h3>Diffusion des données de disponibilité temps réel - Vélos et bornes - Vélib</h3>
        <p>Site de diffusion des données en temps réel du nombre de vélos mécaniques et électriques disponibles <br>à chaque station ainsi que le nombre de bornettes libres dans les stations Vélib' Métropole.</p>
    </div>
</div>

<div class="stations-container">
    <?php // ouverture de la balise PHP
    require 'vendor/autoload.php';
    use GuzzleHttp\Client; // guzzle permet de faire les requete a l'API velib

    $client = new Client();

    try {
        $response = $client->request('GET', 'https://velib-metropole-opendata.smovengo.cloud/opendata/Velib_Metropole/station_status.json'); // URL de l'API
        $body = json_decode($response->getBody(), true);

        foreach ($body['data']['stations'] as $station) { // Parcours des stations
            echo '<div class="station-card">';
            echo '<div class="station-icon">';
            echo '<img src="./img/bikes_and_new_mobility 1.svg">';
            echo '</div>';
            echo '<div class="station-info">';
            echo '<h2>Station ID: ' . ($station["station_id"]) . '</h2>'; // recupereID de la station
            echo '<p>Vélos disponibles: ' . ($station["num_bikes_available"]) . '</p>';
            echo '<p>Mécaniques: ' . ($station["num_bikes_available_types"][0]["mechanical"] ?? 0) . '</p>';
            echo '<p>Emplacements libres: ' . ($station["num_docks_available"]) . '</p>';
            echo  '<p> ⚠️ Des incohérences peuvent survenir car certains vélos sont en maintenance.</p>';
            echo '</div>';
            echo '</div>';
        }
    } catch (GuzzleException $e) { // debug donné par chatgpt
        echo "<p class='error'>Erreur: " . $e->getMessage() . "</p>"; // gestion des erreurs (vu en cours
    }
    ?>
</div>

</body>
</html>
