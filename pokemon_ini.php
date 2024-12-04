<?php

require_once "./class/pokemon.php";
require_once "./class/PokemonEau.php";
require_once "./class/PokemonFeu.php";
require_once "./class/PokemonPlante.php";

$vaporeon = new PokemonEau();
$vaporeon->setNom("vaporeon")
    ->setType("eau")
    ->setPuissanceAttaque(65)
    ->setPointsDeVie(130) 
    ->setMaxPdv(130) 
    ->setDefense(60);

$piplup = new PokemonEau();  
$piplup->setNom("piplup")
    ->setType("eau")
    ->setPuissanceAttaque(53)
    ->setPointsDeVie(51)
    ->setMaxPdv(51)
    ->setDefense(53);

$gyarados = new PokemonEau();
$gyarados->setNom("gyarados")
    ->setType("eau")
    ->setPuissanceAttaque(95)
    ->setPointsDeVie(125)
    ->setMaxPdv(125)
    ->setDefense(79);

$sceptile = new PokemonPlante();
$sceptile->setNom("sceptile")
    ->setType("plante")
    ->setPuissanceAttaque(70)
    ->setPointsDeVie(65)
    ->setMaxPdv(65)
    ->setDefense(60);

$mamoswine = new PokemonPlante();
$mamoswine->setNom("mamoswine")
    ->setType("plante")
    ->setPuissanceAttaque(110)
    ->setPointsDeVie(130)
    ->setMaxPdv(130)
    ->setDefense(80);   

$garchomp = new PokemonPlante();
$garchomp->setNom("garchomp")
    ->setType("plante")
    ->setPuissanceAttaque(108)
    ->setPointsDeVie(130)
    ->setMaxPdv(130)
    ->setDefense(95);

$emboar = new PokemonFeu();
$emboar->setNom("emboar")
    ->setType("feu")
    ->setPuissanceAttaque(110)
    ->setPointsDeVie(123)
    ->setMaxPdv(123)
    ->setDefense(65);

$lucario = new PokemonFeu();
$lucario->setNom("lucario")
    ->setType("feu")
    ->setPuissanceAttaque(70)
    ->setPointsDeVie(110)
    ->setMaxPdv(110)
    ->setDefense(70);

$pokemonTab = [$vaporeon, $piplup, $gyarados, $sceptile, $mamoswine, $garchomp, $emboar, $lucario];
?>