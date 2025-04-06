<?php

$note1 = 1;
$note2 = 2;
$note3 = 15;
$nom = "Alice"; //les valeurs sont defini ici mais on peut les changer

function calculerMoyenne(){ // fonction qui calcule la moyenne
    global $note1, $note2, $note3;
    $moyenne = ($note1 + $note2 + $note3) / 3;
    return $moyenne;

}
echo calculerMoyenne();
echo "<br>"; // saut de ligne vide (pour le visuel)

function afficherResultat(){ // fonction qui affiche le resultat
    global $nom, $moyenne;
    if ($moyenne <= 9){ // boucle avec condition
        echo "La moyenne de $nom est de $moyenne est elle est insuffisante"; // affiche si 9 ou moins

    }
    else if ($moyenne >= 10){
        echo "La moyenne de $nom est de $moyenne est elle est suffisante"; // affiche si 10 ou plus
    }

}

echo afficherResultat(); // appel de la fonction pour l'afficher