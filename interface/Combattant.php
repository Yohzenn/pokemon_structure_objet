<?php

interface Combattant {

    public function seBattre(Pokemon $adversaire);


    public function utiliserAttaqueSpeciale(Pokemon $adversaire);

}