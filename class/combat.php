<?php

class Combat{
    public function demarrerCombat(pokemon $pokemon1, pokemon $pokemon2){
        while (!$pokemon1.estKO() && !$pokemon2.estKO()){
            $randomNumber = rand(1, 5);
            tourDeCombat( $pokemon1, $pokemon2, $randomNumber);
            $pokemon2.getPointsDeVie();
            if (!$pokemon2.estKO());
                tourDeCombat($pokemon1, $pokemon2);
                $pokemon1.getPointsDeVie();
        }
        return determinerVainqueur($pokemon1, $pokemon2);

    }

    public function tourDeCombat(pokemon $attaquant, pokemon $defenseur, $attaque){
        if ($attaque <=3 ){
            $attaquant.attaquer($defenseur);
        }
        else{
            $attaquant.capaciteSpeciale($defenseur);
        }
        return $defenseur;
    }

    public function determinerVainqueur(pokemon $pokemon1, pokemon $pokemon2){
        if (!$pokemon1.estKO()){
            return $pokemon1;
        }
        return $pokemon2;
    }
}