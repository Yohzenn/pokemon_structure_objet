<?php
require_once "./pokemon_ini.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combat pokemon</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://kit.fontawesome.com/ec35368b02.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./src/css/style.css">
</head>
<body>
    <h1>Combat entre deux Pokemons</h1>

    <?php
    if (isset($_GET['pokemon1_select']) && isset($_GET['pokemon2_select']) && $_GET['pokemon1_select'] != $_GET['pokemon2_select']) {
        $pokemon1 = $pokemonTab[htmlspecialchars($_GET['pokemon1_select'])];
        $pokemon2 = $pokemonTab[htmlspecialchars($_GET['pokemon2_select'])];

        echo "<h2>Combat entre : </h2>";
        echo "<p>Pokemon 1 : " . $pokemon1->getNom() . "</p>";
        echo "<p>Pokemon 2 : " . $pokemon2->getNom() . "</p>";
        $link = './front_combat.php?pokemon1_select=' . $_GET['pokemon1_select'] . '&pokemon2_select=' . $_GET['pokemon2_select'];
        echo "<a href='".$link."'>Lancer le combat</a>";
    } else {
        ?>
        <div class="swiper">
        <div class="swiper-button-prev">
            <i class="fa-solid fa-arrow-left"></i>
        </div>
        <div class="swiper-wrapper" id="container">
            <?php
            $i = 0;
            foreach ($pokemonTab as $pokemon) {            
            ?>
            <div class="swiper-slide">
                <input type="hidden" id="id_pokemon" value=<?php echo $i ?>>
                <div id="top">
                    <h3 id="nom"><?= $pokemon->getNom(); ?> </h3>
                    <h3 id="pv"><?= $pokemon->getPointsDeVie(); ?></h3>
                </div>
                <?php 
                $url = "https://pokeapi.co/api/v2/pokemon/" . $pokemon->getNom();
                $response = file_get_contents($url);
                $data = json_decode($response, true);
                ?>
                <img src="<?= $data['sprites']['front_default'];?>" id="pokemon-image" alt="">
                <div id="type-holder">
                    <h3 id="type-name">Type:</h3>
                    <h3 id="type"><?= $pokemon->getType(); ?></h3>
                </div>
                <div id="faiblesse-holder">
                    <h3 id="faiblesse-name">Faiblesse</h3>
                    <h3 id="faiblesse">
                        <?php if( $pokemon->getType() === 'feu'){
                                echo 'Eau';
                                } 
                              else if( $pokemon->getType() === 'eau'){
                                echo 'Plante';
                                } 
                              else{
                                echo 'Feu';
                                } 
                        ?>
                    </h3>
                </div>
                <div id="attaque-holder">
                    <h3 id="attaque-name">Attaque:</h3>
                    <h3 id="attaque"><?= $pokemon->getPuissanceAttaque(); ?></h3>
                </div>
                <div id="defense-holder">
                    <h3 id="defense-name">Defense:</h3>
                    <h3 id="defense"><?= $pokemon->getDefense(); ?></h3>
                </div>
            </div>
            <?php 
                $i ++;
            }
            ?>
        </div>      
        <div class="swiper-button-next">
            <i class="fa-solid fa-arrow-right"></i>
        </div>
        </div>

        <form action="index.php" method="get">
            <input type="hidden" id="pokemon_select_hidden" name="pokemon1_select" value="">
            <input type="hidden" name="pokemon2_select" id="pokemon2_select" value="<?php echo rand(0, count($pokemonTab)-1); ?>">
            <input type="submit" value="combattre">
        </form>

    <?php }; ?>


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="./src/javascript/slider.js"></script>
</body>
</html>
