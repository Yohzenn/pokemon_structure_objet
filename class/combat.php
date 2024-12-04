<?php

class Combat {

    private $historique;

    public function getHistorique(){
        return $this->historique;
    }
    public function setHistorique($tour,$degat){
        $this->historique[] = [$tour,$degat];
        return $this;
    }
    public function demarrerCombat(Pokemon $pokemon1, Pokemon $pokemon2) {
        while (!$pokemon1->estKO() && !$pokemon2->estKO()) {
            // Tour du Pokémon 1
            $randomNumber = rand(1, 5);
            $this->tourDeCombat($pokemon1, $pokemon2, $randomNumber);

            if ($pokemon2->estKO()) {
                break; // Arrêter si le Pokémon 2 est KO
            }

            // Tour du Pokémon 2
            $randomNumber = rand(1, 5);
            $this->tourDeCombat($pokemon2, $pokemon1, $randomNumber);
        }

        return $this->determinerVainqueur($pokemon1, $pokemon2);
    }

    public function tourDeCombat(Pokemon $attaquant, Pokemon $defenseur, int $attaque) {
        if ($attaque >= 1 && $attaque <= 3) {
            $degat = $attaquant->attaquer($defenseur); 
            $tour = $attaquant->getNom() .' attaque '. $defenseur->getNom(). ' avec une attaque normale de ' .$degat . " dégats";
            $this->setHistorique($tour, $degat);
            
        } else {
            $degat = $attaquant->capaciteSpeciale($defenseur); // Capacité spéciale
            $tour =  $attaquant->getNom() .' attaque '. $defenseur->getNom(). ' avec une attaque speciale de ' . $degat[0] . " dégats avec un bonus de ". $degat[1];
            $this->setHistorique($tour, $degat[0]);
        }
    }

    public function determinerVainqueur(Pokemon $pokemon1, Pokemon $pokemon2) {
        if (!$pokemon1->estKO()) {
            return $pokemon1;
        }
        return $pokemon2;
    }
}