
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
</head>
<body>
    <div id="tab_combat" data-combat='<?php echo json_encode($tab_combat); ?>' data-gagnant='<?php echo $gagnant; ?>'></div>
    <p> Appuyer sur entree pour continuer</p>
    <p class="deroulement"></p>
</body>
<script>
    const tabCombatElement = document.getElementById('tab_combat');
    const tabCombat = JSON.parse(tabCombatElement.getAttribute('data-combat'));
    const gagnant = tabCombatElement.getAttribute('data-gagnant');
    const info = document.querySelector('.deroulement');

    let i = 0;
    document.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            if (i < tabCombat.length){
                console.log(tabCombat[i])
                info.innerHTML = tabCombat[i]
                i ++
            }      
        }
        });
</script>
</html>