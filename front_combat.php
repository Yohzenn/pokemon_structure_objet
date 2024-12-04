
<?php

if (isset($_GET['pokemon1_select']) && isset($_GET['pokemon2_select'])) {
    require_once "./pokemon_ini.php";
    require_once "./class/combat.php";

    $pokemon1 = $pokemonTab[htmlspecialchars($_GET['pokemon1_select'])];
    $pokemon2 = $pokemonTab[htmlspecialchars($_GET['pokemon2_select'])];

    $combat = new Combat();

    $gagnant = $combat->demarrerCombat($pokemon1, $pokemon2);
    $tab_combat = $combat->getHistorique();
    $gagnant = $gagnant->getNom();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./src/css/combat.css" />
</head>
<body>
    <div id="tab_combat" data-combat='<?php echo json_encode($tab_combat); ?>' data-first='<?php echo $pokemon1->getNom(); ?>' data-sec='<?php echo $pokemon2->getNom(); ?>'  data-gagnant='<?php echo $gagnant; ?>'></div>
    <div class="img_pokemon_container">
        <div class="pokemon">
            <img id="img1" src="" alt="">
            <div class="health-bar1 health-bar" id="health-bar1">
                <div class="health-bar-fill health-bar-fill1" id="health-bar-fill1" style="width: 100%;"></div>
                <div class="health-bar-text health-bar-text1" id="health-bar-text1"><?php echo $pokemon1->getMaxPdv(); ?></div>
            </div>
        </div>
        <div class="pokemon">
            <img id="img2" src="" alt="">
            <div class="health-bar2 health-bar" id="health-bar2">
                <div class="health-bar-fill health-bar-fill2" id="health-bar-fill2" style="width: 100%;"></div>
                <div class="health-bar-text health-bar-text2" id="health-bar-text2"><?php echo $pokemon2->getMaxPdv(); ?></div>
            </div>
        </div>
    </div>
    <div class="deroulement_placeholder">
        <div class="deroulement_container">
            <p class="deroulement"></p>
            <p class="entree"> Appuyer sur entree pour continuer</p>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", async () => {
    // affichage des pokemons
    const fetchPokemon = async (pokemonName) => {
    const link = "https://pokeapi.co/api/v2/pokemon/" + pokemonName;
    const repsonse = await fetch(
      `https://pokeapi.co/api/v2/pokemon/${pokemonName}`
    );

    const data = await repsonse.json();
    return data.sprites.front_default
    };

    const capitalizeFirstLetter = (text) => {
        if (!text) return "";
            return text.charAt(0).toUpperCase() + text.slice(1).toLowerCase();
    }

    // Affichage des dégats
    const health_bar = (degats, pv, pv_max, pokemon_nb) =>{
        if (pokemon_nb == 1){          
            pv = Math.max(0, pv - degats);
            setTimeout(() => {
                document.getElementById('health-bar-fill1').style.width = `${(pv / pv_max) * 100}%`
                document.getElementById('health-bar-text1').innerHTML = pv
            }, 500);
            
        }
        else{
            pv = Math.max(0, pv - degats);
            setTimeout(() => {
                document.getElementById('health-bar-fill2').style.width = `${(pv / pv_max) * 100}%`
                document.getElementById('health-bar-text2').innerHTML = pv
            }, 500);
        
        }
        return pv
    }
    

    // Recuperation des infos
    const tabCombatElement = document.getElementById('tab_combat');
    const tabCombat = JSON.parse(tabCombatElement.getAttribute('data-combat'));

    const gagnant = tabCombatElement.getAttribute('data-gagnant');
    const pokemon1 = tabCombatElement.getAttribute('data-first');
    const pokemon2 = tabCombatElement.getAttribute('data-sec');

    const pokemon1PV_bar = document.getElementById("health-bar1");
    const pokemon2PV_bar = document.getElementById("health-bar2");

    let pokemon1PV = document.getElementById("health-bar-text1").textContent;
    let pokemon2PV = document.getElementById("health-bar-text2").textContent;
    
    const pokemon1PV_max = pokemon1PV;
    const pokemon2PV_max = pokemon2PV;

    const info = document.querySelector('.deroulement');

    const img1 = document.getElementById("img1");
    const img2 = document.getElementById("img2")

    img1.src = await fetchPokemon(pokemon1);
    img2.src = await fetchPokemon(pokemon2);

    info.innerHTML = `Le combat de ${pokemon1} contre ${pokemon2} va commencer`;

    // Combat
    let i = 0;
    let toggle = true;
    document.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            if (i < tabCombat.length){
                
                if (toggle){
                    toggle = !(toggle)
                    pokemon2PV = health_bar(tabCombat[i][1],pokemon2PV,pokemon2PV_max,2)
                    img1.classList.add("attaque1")
                    img1.classList.remove("degat")
                    img2.classList.add("degat")
                    img2.classList.remove("attaque2")

                    pokemon1PV_bar.classList.remove("degat")
                    pokemon2PV_bar.classList.add("degat")
                }
                else{
                    toggle = !(toggle)

                    pokemon1PV = health_bar(tabCombat[i][1],pokemon1PV,pokemon1PV_max,1)
                    img1.classList.remove("attaque1")
                    img1.classList.add("degat")
                    img2.classList.remove("degat")
                    img2.classList.add("attaque2")

                    pokemon1PV_bar.classList.add("degat")
                    pokemon2PV_bar.classList.remove("degat")
                }
                info.innerHTML = capitalizeFirstLetter(tabCombat[i][0])
                i ++
            }     
            else{
                info.innerHTML = capitalizeFirstLetter(`${gagnant} a gagner !`)
                document.addEventListener("keydown", function(event) {
                    if (event.key === "Enter") {
                       window.location.href = "./index.php"
                    }
                })
            } 
        }
        });
    })


</script>
</html>