<?php

class PokemonFeu extends Pokemon {
    public function capaciteSpeciale(Pokemon $adversaire): array
    {
        $bonus = $adversaire->getType() === "plante" ? 10 : 0;
        $degats = max(0, ($this->getPuissanceAttaque() - $adversaire->getDefense()) + $bonus);
        $adversaire->recevoirDegats(max(0, $degats));
        return [$degats,$bonus];
    }

}