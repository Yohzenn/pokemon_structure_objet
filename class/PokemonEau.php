<?php

class PokemonEau extends Pokemon {
    public function capaciteSpeciale(Pokemon $adversaire): array
    {
        $bonus = $adversaire->getType() === "feu" ? 10 : 0;
        $degats = floor($this->getPuissanceAttaque() - ($this->getPuissanceAttaque() * ($adversaire->getDefense() / 100)) ) + $bonus;
        $adversaire->recevoirDegats($degats);
        return [$degats,$bonus];
    }

}