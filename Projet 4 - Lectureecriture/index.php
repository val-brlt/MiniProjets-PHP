<?php

$lines = file(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'menu.tsv');
foreach ($lines as $k => $line) {
    $lines[$k] = explode("\t", trim($line));
}


//  $fichier = fopen('data/menu.tsv', 'r');
//  $k = 1;
//  echo '<ul>';
// while ($line = fgets($fichier)) {
//     if ($k === 1 || $k === 9|| $k === 14) {
//         echo "<h2>" . $line . '</h2>';
//     }
//         else {
//         $line_explode = explode("\t", $line);
//         echo "<li><strong>" . $line_explode[0] ."</strong><br>". $line_explode[1] . " " .$line_explode[2];
//     }
//     $k++;
// }
// echo '</ul>';


/* Newsletter */
$name_file = date('Y-m-d');
$file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . $name_file;

if (isset($_POST["mail"])) {
    if(filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        file_put_contents($file,$_POST["mail"] . PHP_EOL, FILE_APPEND);
        $msg = "Votre mail a était ajouté à la newsletter !";
    }
    else 
        $msg = "Veuillez entrer un mail valide !";
}
else 
    $msg = "";


?>

<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<!-- Newsletters -->
<h1> Newsletter </h1>
<form method="POST" >
    <label for="mail">Inscrivez vous à la newsletter : <br></label>
    <input type="text" id="mail" name="mail" placeholder="Entrez votre mail.." required>
    <button type="submit" >Inscrivez-vous</button>
</form>
<h3> <?= $msg ?> </h3>


<!-- Menu pizzeria -->
<h1> Menu </h1>
<?php foreach ($lines as $line) : ?>
    <?php if (count($line) === 1) : ?>
        <h2> <?= $line[0] ?> </h2>
    <?php else : ?>
        <ul>
            <div class="container">
                <div class="container_elem">
                    <li><strong><?= $line[0] ?></strong><br>
                        <?= $line[1] ?>
                </div>
                <div class="container_price">
                    <?= $line[2] ?> €</li>
                </div>
            </div>
        </ul>
    <?php endif ?>
<?php endforeach ?>

