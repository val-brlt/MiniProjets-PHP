<?php
$user = [
    'prenom' => 'John',
    'nom' => 'Doe',
    'age' => 18
];
$succes = false;
$error = "";
if (isset($_COOKIE['age']))
    $succes = true;

if (isset($_POST['years'])) {
    if ($_POST['years'] <= 2003 && !(empty($_POST['years']))) {
        setcookie('age', $_POST['years']);
        $succes = true;
    } elseif ($_POST['years'] > 2003 && !(empty($_POST['years']))) {
        $error = "Vous n'avez pas l'âge autorisé pour accéder à ce site";
    }
}
?>

<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<?php if ($succes === false) : ?>
<div class="container">
    <div class=popup>
        <h2> Ce site est réservé au plus de 18 ans ! </h2>
        <h3> Veuillez rentrer votre année de naissance </h3>
        <form method="POST">
            <select name="years">
                <?php for ($i = 2012; $i >= 1921; $i--) : ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor ?>
            </select>
            <button type="submit">Valider</button>
        </form>
        <h3> <?= $error ?> </h3>
    </div>
</div>

<?php else : ?>
    <div class="elem">
    <h1> Bienvenue sur le site interdit -18 </h1>
    <img src="img/chatte.jpg" /></div>
    <div class="elem2"><img src="img/chatte1.jpg" />
    <img src="img/chatte2.jpg" />
    <img src="img/chatte3.jpg" />
    </div>
<?php endif ?>