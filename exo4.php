<?php

$array = [12, 65, 95, 41, 85, 63, 71, 64];

$arrayA = [12, "le", 95, 12, 85, "le", 71, "toi", 95, "la"];
$arrayB = [85, "toi", 95, "la", 65, 94, 85, "avec", 37, "chat"];

?>
<?php
$title = "Exo 4";
require 'header.php';
?>

<!-- QUESTION 1 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 1</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau et retourne la chaîne de caractère HTML permettant d'afficher les valeurs du tableau sous la forme d'une liste.</p>
    <div class="exercice-sandbox">
        <ul>
            <?php
            // /**
            //  * return every value of an array in a html list
            //  *
            //  * @param array $array - input array
            //  * @return string - html list 
            //  */
            // function getList(array $array): string
            // {
            //     $list = '';
            //     foreach ($array as $value) {
            //         $list .= "<li> $value </li>";
            //     }
            //     return "<ul> $list </ul>";
            // }
            // echo getList($arrayB);
            //-------------------------------------
            /**
             * return every value of an array in a html list
             *
             * @param array $array - input array
             * @return string - html list 
             */
            function getList(array $array): string
            {
                $htmlList = array_map(fn ($v) => "<li>$v</li>", $array);
                return "<ul>" . implode($htmlList) . "</ul>";
            }
            echo getList($arrayB)
            ?>
        </ul>
    </div>
</section>

<!-- QUESTION 2 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 2</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et retourne uniquement les valeurs paires. Afficher les valeurs du tableau sous la forme d'une liste HTML.</p>
    <div class="exercice-sandbox">
        <?php
        /**
         * return every even value of an array
         *
         * @param array $array2 - input array
         * @return array - return even values
         */
        function getEvenFromArray(array $array2): array
        {
            $arrayEven = [];
            foreach ($array2 as $value2) {
                if ($value2 % 2 == 0) {
                    $arrayEven[] = $value2;
                }
            }
            return $arrayEven;
        }
        $evenValues = getEvenFromArray($array);
        echo getList($evenValues);
        // --------------------------------------------
        // $even = array_filter($array, function (int $value) {
        //     return $value % 2 === 0;
        // });
        $even = array_filter($array, fn ($v) => $v % 2 === 0);
        var_dump($even);
        // --------------------------------------------
        $isEven = function (int $value) {
            return $value % 2 === 0;
        };
        $even2 = array_filter($array, $isEven);
        var_dump($even2);
        var_dump($isEven)
        ?>
    </div>
</section>

<!-- QUESTION 3 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 3</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et retourne uniquement les entiers d'index pair</p>
    <div class="exercice-sandbox">
        <?php
        /**
         * return every even index of an array in a html list
         *
         * @param array $array3
         * @return array
         */
        // function getEvenFromIndex(array $array3): array
        // {
        //     $evenIndex = [];
        //     foreach ($array3 as $index3 => $value3) {
        //         if ($index3 % 2 == 0) {
        //             $evenIndex[] = $value3;
        //         }
        //     }
        //     return $evenIndex;
        // }
        // $evenIndexes = getEvenFromIndex($array);
        // echo getList($evenIndexes);
        //------------------------------------------
        // function getValuesOfEvenIndexes(array &$array): array
        // {

        //     foreach ($array as $i => $v) {
        //         if ($i % 2 !== 0) {
        //             unset($array[$i]);
        //         }
        //     }
        //     return $array;
        // }
        // echo getList(getValuesOfEvenIndexes($array));
        //------------------------------------------
        function getValuesOfEvenIndexes(array $array): array
        {
            // $evenIndexes = array_filter(array_keys($array), fn ($i) => $i % 2 === 0);
            // return array_intersect_key($array, $evenIndexes);
            return array_filter($array, fn ($i) => $i % 2 === 0, ARRAY_FILTER_USE_KEY);
        }
        echo getList(getValuesOfEvenIndexes($array));
        ?>
    </div>
</section>

<!-- QUESTION 4 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 4</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers. La fonction doit retourner les valeurs du tableau mulipliées par 2.</p>
    <div class="exercice-sandbox">
        <?php
        // /**
        //  * return every doubled value of an array in a html list
        //  *
        //  * @param array $array4
        //  * @return string
        //  */
        // function getDouble(array $array4): string
        // {
        //     $list4 = '';
        //     foreach ($array4 as $value4) {
        //         $doubleArray = $value4 * 2;
        //         $list4 .= "<li> $doubleArray </li>";
        //     }
        //     return $list4;
        // }
        // echo getDouble($array);

        function getDoubleB(array $array): array
        {
            return array_map(fn ($value) => $value * 2, $array);
        }
        var_dump(getDoubleB($array));
        ?>
    </div>
</section>

<!-- QUESTION 4 bis -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 4 bis</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et un entier. La fonction doit retourner les valeurs du tableau divisées par le second paramètre</p>
    <div class="exercice-sandbox">
        <?php
        /**
         * return every value of an array divided by a number in a html list
         *
         * @param array $array4b
         * @param integer $n
         * @return string
         */
        function divideArray(array $array4b, int $n): string
        {
            $list4b = '';
            foreach ($array4b as $value4b) {
                $divideArray = $value4b / $n;
                $list4b .= "<li> $divideArray </li>";
            }
            return $list4b;
        }
        echo divideArray($array, 2);
        ?>
    </div>
</section>

<!-- QUESTION 5 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 5</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers ou de chaînes de caractères et retourne le tableau sans doublons</p>
    <div class="exercice-sandbox">
        <?php
        /**
         * return every value of an array without duplicate in an array
         *
         * @param array $array5
         * @return array
         */
        function getUnique(array $array5): array
        {
            return array_unique($array5);
        }
        var_dump(getUnique($arrayA));
        ?>
    </div>
</section>

<!-- QUESTION 6 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 6</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre 2 tableaux et retourne un tableau représentant l'intersection des 2</p>
    <div class="exercice-sandbox">
        <?php
        /**
         * return every intersect value between 2 arrays in a string
         *
         * @param array $array6
         * @param array $array7
         * @return string
         */
        function getIntersect(array $array6, array $array7): string
        {
            return implode(", ", array_intersect($array6, $array7));
        }
        echo getIntersect($arrayA, $arrayB);
        ?>
    </div>
</section>

<!-- QUESTION 7 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 7</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre 2 tableaux et retourne un tableau des valeurs du premier tableau qui ne sont pas dans le second</p>
    <div class="exercice-sandbox">
        <?php
        /**
         * return values of the first array that are not in the other array
         *
         * @param array $array8
         * @param array $array9
         * @return array
         */
        function getDiff(array $array8, array $array9): array
        {
            return array_diff($array8, $array9);
        }
        var_dump(getDiff($arrayA, $arrayB));

        var_dump(array_diff_ukey($arrayA, $arrayB))
        ?>
    </div>
</section>


<!-- QUESTION 8 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 8</h2>
    <p class="exercice-txt">Réécrire la fonction précédente pour lui ajouter un paramètre booléen facultatif. Si celui-ci est à true, le tableau retourné sera sans doublons</p>
    <div class="exercice-sandbox">
        <?php
        /**
         * return values of the first array that are not in the other array without duplicate
         *
         * @param array $array10
         * @param array $array11
         * @param boolean $removeDuplicates
         * @return array
         */
        function getDiff2(array $array10, array $array11, bool $removeDuplicates = true): array
        {
            if ($removeDuplicates) {
                $newArray = getUnique(array_diff($array10, $array11));
            }
            return $newArray;
        }
        var_dump(getDiff2($arrayA, $arrayB));


        ?>
    </div>
</section>


<!-- QUESTION 9 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 9</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau et un entier et retourne les n premiers éléments du tableau.</p>
    <div class="exercice-sandbox">
        <?php
        /**
         * return "n" values of an array
         *
         * @param array $array12
         * @param integer $n
         * @return array
         */
        function showElements(array $array12, int $n): array
        {
            for ($i = 0; $i < $n; $i++) {
                $newArray2[$i] = $array12[$i];
            }
            return $newArray2;
        }
        var_dump(showElements($arrayA, 4));
        ?>
    </div>
</section>
</div>
<?php
require 'footer.php';
?>
</body>

</html>