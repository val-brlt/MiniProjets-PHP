<?php


/* FONCTIONS COMPTEUR DE VUES */

/* Ajoute une vue + ajoute un fichier selon le jour */
function add_viewer(): void
{
    $file = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . "counter";
    $file_name = date("Y-m-d") . " counter";
    $file_day = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $file_name;
    add_view($file);
    add_view($file_day);
}
/* Ajoute une vue */
function add_view($file): void
{
    // récupere le contenu du fichier compteur
    $k = file_get_contents($file);
    $k++;
    // on le modifie dans le fichier compteur avex + 1
    file_put_contents($file, $k);
}
/* Récupère le nombre de vues */
function get_views(): int
{
    $file = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . "counter";
    return file_get_contents($file);
}
/* Reset le nombre de vues */
function reset_views(): void
{
    $file = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . "counter";
    file_put_contents($file, '0');
}
