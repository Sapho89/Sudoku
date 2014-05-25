<?php include './fonctions.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>I have a back bone</title>
    </head>
    <body>
        <button id="add-friend">Add Friend</button>
        <ul id="friends-list">
        </ul>
        <?php
        echo " (1) - - - CREATION DE LA GRILLE - - -<br />";
        $aSudoku = array(
            array(1, 2, 3, 4, 5, 6, 7, 8, 9),
            array(4, 5, 6, 7, 8, 9, 1, 2, 3),
            array(7, 8, 9, 1, 2, 3, 4, 5, 6),
            array(2, 3, 4, 5, 6, 7, 8, 9, 1),
            array(5, 6, 7, 8, 9, 1, 2, 3, 4),
            array(8, 9, 1, 2, 3, 4, 5, 6, 7),
            array(3, 4, 5, 6, 7, 8, 9, 1, 2),
            array(6, 7, 8, 9, 1, 2, 3, 4, 5),
            array(9, 1, 2, 3, 4, 5, 6, 7, 8));


        affiche($aSudoku);

        $cpt = 5;
        while ($cpt > 0) {
            $a = rand(1, 2); //Ligne ou Colonne
            $b = rand(1, 3); //1, 2,3 ième région

            do {
                $c = rand(-1, 1);
            } while ($c == 0);

            if ($a == 1) {
                /* echo "- - - INVERSION DES LIGNES - - -<br />";
                  echo "LIGNE<br />";
                  echo $b . " region<br />"; */
                $caseCentrale = $b * 2 + 1 - 1 - 1;
                $caseCote = $caseCentrale + $c;

                /* echo "Case Centrale:" . $caseCentrale . "<br />";
                  echo "Case Cote:" . $caseCote . "<br />"; */

                for ($j = 0; $j < 9; $j++) {
                    $tmp = $aSudoku[$caseCentrale][$j];
                    $aSudoku[$caseCentrale][$j] = $aSudoku[$caseCote][$j];
                    $aSudoku[$caseCote][$j] = $tmp;
                }
            } else {
                /* echo "- - - INVERSION DES COLONNES - - -<br />";
                  echo "COLONNE<br />";
                  echo $b . " region<br />"; */
                $caseCentrale = $b * 2 + 1 - 1 - 1;
                $caseCote = $caseCentrale + $c;


                /* echo "Case Centrale:" . $caseCentrale . "<br />";
                  echo "Case Cote:" . $caseCote . "<br />"; */

                for ($i = 0; $i < 9; $i++) {
                    $tmp = $aSudoku[$i][$caseCentrale];
                    $aSudoku[$i][$caseCentrale] = $aSudoku[$i][$caseCote];
                    $aSudoku[$i][$caseCote] = $tmp;
                }
            }
            $cpt--;
        }

        affiche($aSudoku);

        echo " - - - - - ALGORITHME DE PERFORATION - - - - <br />";
        for ($k = 0; $k < 9; $k++) { //Sur chaque ligne, un nombre est creusé
            $cpt = 0;
            do {
                $j = rand(0, 8);
                //} while ($aSudoku[$k][$j] != 0);

                if (verifLigne($aSudoku, $k, $j) && verifColonne($aSudoku, $k, $j) && verifCase($aSudoku, $k, $j)) {
                    $aSudoku[$k][$j] = '_';
                    $cpt++;
                }
            } while ($cpt < 2);
        }
        affiche($aSudoku);
        ?>



        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
        <script src="http://ajax.cdnjs.com/ajax/libs/underscore.js/1.1.4/underscore-min.js"></script>
        <script src="http://ajax.cdnjs.com/ajax/libs/backbone.js/0.3.3/backbone-min.js"></script>
        <script src="web/js/appview.js"></script>
    </body>
</html>



