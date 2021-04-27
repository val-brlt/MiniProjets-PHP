<?php

function add_price(array $array,float $price):float {
    foreach ($array as $id)
        $price += $id;
    return $price;
}

function is_checked(array $array, string $value) {
    foreach ($array as $array2) {
        foreach ($array2 as $id) {
            if($id === $value)
                echo 'checked';
        }
    }
}
