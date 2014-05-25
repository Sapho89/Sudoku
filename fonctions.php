<!DOCTYPE html>
<?php

function affiche($tab) {
    echo "- - - AFFICHAGE DE LA GRILLE - - -<br />";
    for ($i = 0; $i < 9; $i++) {

        for ($j = 0; $j < 9; $j++) {
            if (($j) % 3 == 0) {
                echo " &nbsp; ";
            }
            echo " &nbsp; ";
            echo $tab[$i][$j];
        }

        if (($j) % 3 == 0)
            echo "<br />";
        if (($i + 1) % 3 == 0)
            echo "<br />";
    }
}

function verifLigne($aSudoku, $i, $j) {
    $vide = 0;
    for ($j = 0; $j < 9; $j++) {
        if ($aSudoku[$i][$j] == '_') {
            $vide++;
        }
    }
    if ($vide > 1) {
        return false;
    } else {
        return true;
    }
}

function verifColonne($aSudoku, $i, $j) {
    $vide = 0;
    for ($i = 0; $i < 9; $i++) {
        if ($aSudoku[$i][$j] == '_') {
            $vide++;
        }
    }
    if ($vide > 1) {
        return false;
    } else {
        return true;
    }
}

function verifCase($aSudoku, $i, $j) {
    return true;
}
