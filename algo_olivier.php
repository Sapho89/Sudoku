<?php include './fonctions_olivier.php'; ?>
<html>
    <head>
        <title>Sudoku</title>
        <link rel="stylesheet" type="text/css" href="CSS.css">
    </head>
    <body>

        <?php
        //declaration des variables
        $test_insert = 0; //test pour savoir si le nombre existe déjà
        $cptr_insert_colonne = 0; // compteur pour savoir si une valeur est déjà existante
        $cptr_insert_ligne = 0;
        $lf = 1;    // compteur ligne final
        $cf = 1;    // compteur colonne final
        $newvaleur = 0;
        $tab = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);


        // initialisation du tableau sudoku
        for ($i = 1; $i <= 9; $i++) {
            for ($j = 1; $j <= 9; $j++) {
                $sudoku[$i][$j] = 0;
            }
        }


        affichage_sudoku($sudoku); //aff sudoku
        premier_test_ok($sudoku);
        echo "<br />";
        exit();
        affichage_sudoku($sudoku); //aff sudoku

        for ($lf = 1; $lf <= 9; $lf++) {
            $tab = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            for ($cf = 1; $cf <= 9; $cf++) {
                $test_insert = 0;
                while ($test_insert == 0) {     //echo "test1";
                    while ($newvaleur == 0) {
                        $var = rand(1, 9);
                        if ($var != $tab[1] && $var != $tab[2] && $var != $tab[3] && $var != $tab[4] && $var != $tab[5] && $var != $tab[6] && $var != $tab[7] && $var != $tab[8] && $var != $tab[9])
                            $newvaleur = 1;
                    }
                    $newvaleur = 0;
                    $tab[$cf] = $var;

                    echo $tab[1];
                    echo $tab[2];
                    echo $tab[3];
                    echo $tab[4];
                    echo $tab[5];
                    echo $tab[6];
                    echo $tab[7];
                    echo $tab[8];
                    echo $tab[9] . "<br>";

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
                        else {
                            /*
                              trouver un moyen de placer la recursivité (annulé la valeur précédente)
                             */
                        }
                    }
                    //echo "compteur = ".$cptr_insert_colonne."<br>";
                    if ($cptr_insert_colonne == 9 && $cptr_insert_ligne == 9) {

                        $sudoku[$lf][$cf] = $var; //echo $sudoku[$lf][$cf];
                        $cptr_insert_colonne = 0;
                        $cptr_insert_ligne = 0;
                        $test_insert = 1;
                        echo "fini";
                    } else {
                        $cptr_insert_colonne = 0;
                        $cptr_insert_ligne = 0;
                    }
                }
            }
        }
        affichage_sudoku($sudoku); //aff sudoku
        // test avec le tableau de 1 à 9
        /* $tab = array(1,2,3,4,5,6,7,8,9);
          //echo $tab[8];
          for ($i=8;$i>=0;$i--)
          {	$var = rand ($tab[0],$tab[$i]);
          echo "<br>".$var."<br>";
          for ($j=0;$j<=$i;$j++)
          if ($tab[$j] == $var)
          unset($tab[$j]);
          $tab = array_values($tab);
          for ($j=0;$j<$i;$j++)
          echo $tab[$j];
          }
         */
        ?>



    </body>
</html>