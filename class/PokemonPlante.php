<?php

class PokemonPlante extends Pokemon {
    public function capaciteSpeciale(Pokemon $adversaire): int
    {
        $bonus = $adversaire->getType() === "Eau" ? 10 : 0;
        $degats = $this->getPuissanceAttaque() + $bonus  - $adversaire->getDefense();
        $adversaire->recevoirDegats(max(0, $degats));
        return $degats;
    }

}