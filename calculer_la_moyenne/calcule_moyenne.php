<?php

$note1 = 13;
$note2 = 17;
$note3 = 15;
$nom = "Alice"; // les valeurs sont définies ici mais on peut les changer

function calculerMoyenne() { // fonction qui calcule la moyenne
    global $note1, $note2, $note3;
    $moyenne = ($note1 + $note2 + $note3) / 3;
    return $moyenne;
}

$moyenne = calculerMoyenne();
echo $moyenne;
echo "<br>"; // saut de ligne vide (pour le visuel)

function afficherResultat($nom, $moyenne) { // fonction qui affiche le résultat
    if ($moyenne <= 9) { // boucle avec condition
        echo "La moyenne de $nom est de $moyenne et elle est insuffisante"; // affiche si 9 ou moins
    } else if ($moyenne >= 10) {
        echo "La moyenne de $nom est de $moyenne et elle est suffisante"; // affiche si 10 ou plus
    }
}

afficherResultat($nom, $moyenne); // appel de la fonction pour l'afficher
?>