<?php

trait Soins {
    public function soigner(){
        $this->getPointsDevie() + $this->getMaxPdv(); 
    }
}