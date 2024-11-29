<?php

require_once './class/Pokemon.php' ;
require_once './class/PokemonEau.php' ;




$vaperon = new PokemonEau();
$vaperon
    ->setNom("vaperon")
    ->setType("eau")
    ->setPuissanceAttaque(130)
    ->setPointsDeVie(65)
    ->setDefense(60);

// $vaperon->capaciteSpeciale($adversaire);


echo '<p> test du pokemon:' . $vaperon->getNom() ;