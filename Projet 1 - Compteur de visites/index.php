<?php
require "functions.php";
add_viewer();
if (isset($_POST['reset'])) {
    if ($_POST['reset'] === "Clique ici pour reset les vues") {
        reset_views();
        unset($_POST);
        header("Refresh:0");
    }
}

?>

<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<div class="txt">
    <h1> Compteur de vues de page </h1>
    <h3>
        Création d'un compteur de visites :<br>

        - Création d'un fichier "counter" qui enregistre un numéro qui correspond au nombre de visites<br>
        - On récupère ce numéro et on le réecrit dans le fichier en l'additionant.<br>
        - Ajout d'un bouton reset de vue<br>  
        + Ajout des "vues par jour" avec des fichiers créees chaque jours<br>
        <br>
        Langages utilisés: HTML&CSS, PHP<br>
        Compétences: Lecture et écriture<br>
    </h3>
</div>


<div class="counter">
    <div class="counter_box">
        <h1> Nombres de vues : <?= get_views(); ?> </h1>
    </div>
    <div class="button_counter">
        <form method="POST">
            <input type="submit" name="reset" value="Clique ici pour reset les vues" />
            <input type="submit" name="refresh" value="Actualiser la page" />
        </form>
    </div>
</div>