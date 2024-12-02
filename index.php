
<?php
require_once "./pokemon_ini.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combat pokemon</title>
</head>
<body>
    <h1>Combat entre deux Pokemons</h1>
    <?php
    if (isset($_GET['pokemon1_select']) && isset($_GET['pokemon2_select'])) {
        $pokemon1 = $pokemonTab[htmlspecialchars($_GET['pokemon1_select'])];
        $pokemon2 = $pokemonTab[htmlspecialchars($_GET['pokemon2_select'])];

        echo "<h2>Combat entre : </h2>";
        echo "<p>Pokemon 1 : " . $pokemon1->getNom() . "</p>";
        echo "<p>Pokemon 2 : " . $pokemon2->getNom() . "</p>";
        $link = './front_combat.php/?pokemon1_select='. $_GET['pokemon1_select'] . '&pokemon2_select='. $_GET['pokemon2_select'];
        echo "<a href='".$link."'>Lancer le combat</a>";

    }
    
    
    else{
    ?>
        
    <form action="index.php" method="get">
        <select id="pokemon_select" name="pokemon1_select">
            <option value="" disabled selected>-- Sélectionner un Pokémon --</option>
            <?php
            $i = 0;
            foreach ($pokemonTab as $pokemon) {
                echo "<option value='" . $i . "' data-name='" . $pokemon->getNom() . "' data-type='" . $pokemon->getType() . "' data-pv='" . $pokemon->getPointsDeVie() . "' data-attaque='" . $pokemon->getPuissanceAttaque() . "' data-defense='" . $pokemon->getDefense() . "'>" . $pokemon->getNom() . "</option>";
                $i ++;
            }
            ?>
        </select>
        <input type="hidden" name="pokemon2_select" value="<?php echo rand(0, count($pokemonTab)-1);  ?>">
        <input type="submit" value="combattre">


    <!-- Affichage des informations du Pokémon -->
     <div class="info-container">
        <h3 id="info">Séléctionné un pokemon pour afficher ses informationss</h3>
        <h3 id="pokemon-name"></h3>
        <p id="pokemon-type"></p>
        <p id="pokemon-pv"></p>
        <p id="pokemon-attaque"></p>
        <p id="pokemon-defense"></p>
        <img id="pokemon-image" src="" />
    </div>
    <?php }; ?>
    <script src="./src/javascript/script.js"></script>
</body>
</html>
