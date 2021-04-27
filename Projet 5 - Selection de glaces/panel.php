<?php
//checkbox
$parfum = [
    'Fraise' => 4,
    'Chocolat' => 5,
    'Vanille' => 3
];

// Radio
$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];
// Checkbox
$supplements = [
    'Pépites de chocolat' => 1,
    'Chantilly' => 0.5
];
$error = null;
$price = 0;


require 'function.php';

// Calcul du prix
if(isset($_GET['parfum']) && isset($_GET['cornets'])) {
    
    $parfum = array_intersect_key( $parfum , array_flip($_GET['parfum']) );
    $cornets = array_intersect_key( $cornets , array_flip($_GET['cornets']) );
    
    $price = add_price($parfum, $price);
    $price = add_price($cornets, $price);

    if (isset($_GET['supplements'])) {
        $supplements = array_intersect_key( $supplements , array_flip($_GET['supplements']) );
        $price = add_price($supplements, $price);
    }
}
else {
    $error =  "Veuillez sélectionner un parfum et un cornet";
}

?>

<form  method="GET">
    <h2> Parfum  :</h2>
        <input type="checkbox" name="parfum[]" value="Fraise" <?php is_checked($_GET, 'Fraise') ?> > Fraise - 4€<br>
        <input type="checkbox" name="parfum[]" value="Vanille" <?php is_checked($_GET, 'Vanille') ?>> Vanille - 3€ <br>
        <input type="checkbox" name="parfum[]" value="Chocolat" <?php is_checked($_GET, 'Chocolat') ?>> Chocolat - 5€<br>
    <h2> Cornets :</h2>
        <input type="radio" name="cornets[]" value="Pot" <?php is_checked($_GET, 'Pot') ?> > Pot - 2€<br>
        <input type="radio" name="cornets[]" value="Cornet" <?php is_checked($_GET, 'Cornet') ?>> Cornet - 3€<br>
    <h2> Supplements : </h2>
        <input type="checkbox" name="supplements[]" value="Pépites de chocolat" <?php is_checked($_GET, 'Pépites de chocolat') ?>> Pépites de chocolat - 1€<br>
        <input type="checkbox" name="supplements[]" value="Chantilly"  <?php is_checked($_GET, 'Chantilly') ?>> Chantilly - 0.5€<br>

    <button type="submit">Clique ici pour connaître le prix</button>
</form>

<?php if($error === null): ?>
    <h1> le prix est de <?= $price ?>  €</h1>
<?php else: ?>
    <h1> <?= $error ?> </h1>
<?php endif; ?>

