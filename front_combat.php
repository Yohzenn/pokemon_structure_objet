<?php

if (isset($_GET['pokemon1_select']) && isset($_GET['pokemon2_select'])) {
    require_once "./pokemon_ini.php";
    require_once "./class/combat.php";

    $pokemon1 = $pokemonTab[htmlspecialchars($_GET['pokemon1_select'])];
    $pokemon2 = $pokemonTab[htmlspecialchars($_GET['pokemon2_select'])];

    $combat = new Combat();

    $gagnant = $combat->demarrerCombat($pokemon1, $pokemon2);
    echo $gagnant->getNom().' a gagné !';
}
?>