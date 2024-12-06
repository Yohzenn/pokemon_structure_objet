<?php

class PokemonFeu extends Pokemon {
    public function capaciteSpeciale(Pokemon $adversaire): array
    {
        $bonus = $adversaire->getType() === "plante" ? 10 : 0;
        $degats = floor($this->getPuissanceAttaque() - ($this->getPuissanceAttaque() * ($adversaire->getDefense() / 100)) ) + $bonus;
        $adversaire->recevoirDegats(max(0, $degats));
        return [$degats,$bonus];
    }

}