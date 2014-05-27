<?php

function affichage_sudoku($sudoku) {
// affichage du tableau sudoku
    echo "<table border=1px width=500px><tr>";
    for ($i = 1; $i <= 9; $i++) {
        for ($j = 1; $j <= 9; $j++) {
            echo "<td>" . $sudoku[$i][$j] . "</td>";
        }
        if ($i < 9)
            echo "</tr><tr>";
        else
            echo "</tr>";
    }
    echo "</table>";
}

function premier_test_ok($sudoku) {        //declaration des variables
    $test_insert = 0; //test pour savoir si le nombre existe déjà
    $cptr_insert_colonne = 0; // compteur pour savoir si une valeur est déjà existante
    $lf = 1;    // compteur ligne final
    $cf = 1;    // compteur colonne final

    for ($lf = 1; $lf <= 9; $lf++) {
        for ($cf = 1; $cf <= 9; $cf++) {

            $test_insert = 0;
            while ($test_insert == 0) {     //echo "test1";
                $var = rand(1, 9);
                for ($c = 1; $c <= 9; $c++) {    //echo "<br>test2";
                    //echo $var;
                    //echo $sudoku[$lf][$c];
                    if ($var != $sudoku[$lf][$c])
                        $cptr_insert_colonne++;
                }
                //echo "compteur = ".$cptr_insert_colonne."<br>";
                if ($cptr_insert_colonne == 9) {

                    $sudoku[$lf][$cf] = $var;
                    //echo $sudoku[$lf][$cf];
                    $$cptr_insert_colonne = 0;
                    $test_insert = 1;
                    //echo "fini";
                } else
                    $cptr_insert_colonne = 0;
            }
        }
    }
    affichage_sudoku($sudoku);
}

function deuxieme_test_risque_de_boucle_infini() {
    for ($lf = 1; $lf <= 9; $lf++) {
        for ($cf = 1; $cf <= 9; $cf++) {
            $test_insert = 0;
            while ($test_insert == 0) {     //echo "test1";
                $var = rand(1, 9);
                //comparaison de la valeur random sur la ligne
                for ($c = 1; $c <= 9; $c++) {    //echo "<br>test2";
                    //echo $var;
                    //echo $sudoku[$lf][$c];
                    if ($var != $sudoku[$lf][$c])
                        $cptr_insert_colonne++;
                }
                //comparaison de la valeur random sur la colonne
                for ($l = 1; $l <= 9; $l++) {    //echo "<br>test2";
                    //echo $var;
                    //echo $sudoku[$lf][$c];
                    if ($var != $sudoku[$l][$cf])
                        $cptr_insert_ligne++;
                }
                //echo "compteur = ".$cptr_insert_colonne."<br>";
                if ($cptr_insert_colonne == 9 && $cptr_insert_ligne == 9) {

                    $sudoku[$lf][$cf] = $var;
                    echo $sudoku[$lf][$cf];
                    $$cptr_insert_colonne = 0;
                    $cptr_insert_ligne = 0;
                    $test_insert = 1;
                    echo "fini";
                } else
                    $cptr_insert_colonne = 0;
            }
        }
    }
}

?>