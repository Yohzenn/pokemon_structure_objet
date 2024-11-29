<?php

class PokemonPlante extends Pokemon {
    public function capaciteSpeciale(Pokemon $adversaire): void
    {
        $bonus = $adversaire->getType() === "Plante" ? 10 : 0;
        $degats = $this->getPuissanceAttaque() + $bonus  - $adversaire->getDefense();
        $adversaire->recevoirDegats(max(0, $degats));
    }

}