<?php 


abstract class pokemon {
    private $nom;
    private $type;
    private $pointsDeVie ;
    private $puissanceAttaque; 
    private $defense;

    public function setNom(string $value): self
  {
    $this->nom = $value;
    return $this;
  }

    public function getNom(): string
  {
    return $this->nom;
  }

    public function setType(string $value): self
  {
    $this->type = $value;
    return $this;
  }

   public function getType(): string
  {
    return $this->type;
  }

   public function setPointsDeVie(int $value): self
  {
    $this->pointsDeVie = $value;
    return $this;
  }

    public function getPointsDeVie(): int
  {
    return $this->pointsDeVie;
  }

  public function setPuissanceAttaque(int $value): self
  {
    $this->puissanceAttaque = $value;
    return $this;
  }

    public function getPuissanceAttaque(): int
  {
    return $this->puissanceAttaque;
  }

  public function setDefense(int $value): self
  {
    $this->defense = $value;
    return $this;
  }

    public function getDefense(): int
  {
    return $this->defense;
  }

   

   
}