<?php

$note1 = 1;
$note2 = 2;
$note3 = 15;
$nom = "Alice";

function calculerMoyenne(){
    global $note1, $note2, $note3;
    $moyenne = ($note1 + $note2 + $note3) / 3;
    return $moyenne;

}
echo calculerMoyenne();
echo "<br>";

function afficherResultat(){
    global $nom, $moyenne;
    if ($moyenne <= 9){
        echo "La moyenne de $nom est de $moyenne est elle est insuffisante";

    }
    else if ($moyenne <= 10){
        echo "La moyenne de $nom est de $moyenne est elle est suffisante";
    }

}

echo afficherResultat();