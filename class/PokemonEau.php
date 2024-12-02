<?php

class PokemonEau extends Pokemon {
    public function capaciteSpeciale(Pokemon $adversaire): array
    {
        $bonus = $adversaire->getType() === "feu" ? 10 : 0;
        $degats = ($this->getPuissanceAttaque() - $adversaire->getDefense()) +  $bonus;
        $adversaire->recevoirDegats(max(0, $degats));
        return [$degats,$bonus];
    }

}