<?php

class Attaque {
    private $nom ;
    private $puissance;
    private $precision;

     public function setNom(string $value): self
  {
    $this->nom = $value;
    return $this;
  }

    public function getNom(): string
  {
    return $this->nom;
  }

    public function setPuissance(string $value): self
  {
    $this->puissance = $value;
    return $this;
  }

    public function getPuissance(): string
  {
    return $this->puissance;
  }

    public function setPrecision(int $value): self
  {
    $this->precision = $value;
    return $this;
  }

    public function getPrecision(): int
  {
    return $this->precision;
  }

  public function executerAttaque(Pokemon $adversaire)
    {
        if (rand(1, 100) <= $this->getPrecision()) {
            $adversaire->recevoirDegats($this->getPuissance());
            
    }
    }
}

