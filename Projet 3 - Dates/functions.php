<?php

function creneaux_html(array $creneaux)
{
    $res = [];
    foreach ($creneaux as $creneau) {
        $res[] = "de {$creneau[0]}h à {$creneau[1]}h";
    }

    return ' - ' . implode(' et ', $res);
}

function in_creneaux(int $hour, array $creneaux): bool
{
    foreach ($creneaux as $creneau) {
        if ($hour >= $creneau[0] && $hour < $creneau[1])
            return true;
    }
    return false;
}
