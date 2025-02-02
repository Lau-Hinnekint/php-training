<?php

require 'includes/_config.php';
require 'includes/_functions.php';

include 'includes/_header.php';

$array = [12, 65, 95, 41, 85, 63, 71, 64];

$arrayA = [12, "le", 95, 12, 85, "le", 71, "toi", 95, "la"];
$arrayB = [85, "toi", 95, "la", 65, 94, 85, "avec", 37, "chat"];

?>
<!-- QUESTION 1 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 1</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau et retourne la chaîne de caractère HTML permettant d'afficher les valeurs du tableau sous la forme d'une liste.</p>
    <div class="exercice-sandbox">
        <?php
        /**
         * Return every value from array in HTML list.
         *
         * @param array $array input array
         * @return string HTML list
         */
        // function getListFromArray(array $array): string
        // {
        //     $htmlList = '';
        //     foreach ($array as $item) {
        //         $htmlList .= "<li>$item</li>";
        //     }
        //     return "<ul>$htmlList</ul>";
        // }

        // echo getListFromArray($array);


        echo getListFromArray($array);

        ?>
    </div>
</section>

<!-- QUESTION 2 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 2</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et retourne uniquement les valeurs paires. Afficher les valeurs du tableau sous la forme d'une liste HTML.</p>
    <div class="exercice-sandbox">
        <?php

        /**
         * Return every even value from array
         *
         * @param array $array Input values
         * @return array Even values
         */
        function getEvenFromArray(array $array): array
        {
            $arrayEven = [];
            foreach ($array as $value) {
                if ($value % 2 == 0) {
                    $arrayEven[] = $value;
                }
            }
            return $arrayEven;
        }

        $evenValues = getEvenFromArray($array);

        echo getListFromArray($evenValues);

        echo '<br>';

        function getEvenFromArray2(array $array): array
        {
            // return array_filter($array, function($v) {
            //     return $v % 2 === 0;
            // });
            return array_filter($array, fn ($v) => $v % 2 === 0);
        }

        $evenValues2 = getEvenFromArray2($array);
        echo getListFromArray($evenValues2);
        ?>
    </div>
</section>

<!-- QUESTION 3 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 3</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et retourne uniquement les entiers d'index pair</p>
    <div class="exercice-sandbox">

        <?php

        function getValuesOfEvenIndexes(array $array): array
        {
            // $evenIndexes = array_filter(array_keys($array), fn($i) => $i % 2 === 0);
            // return array_intersect_key($array, $evenIndexes);

            return array_filter($array, fn ($i) => $i % 2 === 0, ARRAY_FILTER_USE_KEY);
        }

        echo getListFromArray(getValuesOfEvenIndexes($array));

        echo '<br>';

        function getValuesOfEvenIndexes2(array $array): array
        {
            foreach ($array as $i => $v) {
                if ($i % 2 !== 0) {
                    unset($array[$i]);
                }
            }
            return $array;
        }

        echo getListFromArray(getValuesOfEvenIndexes2($array));

        var_dump($array);
        ?>

    </div>
</section>

<!-- QUESTION 4 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 4</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers. La fonction doit retourner les valeurs du tableau mulipliées par 2.</p>
    <div class="exercice-sandbox">
        <?php

        function getMultiplyBy2(array $array): array
        {
            $numberList = [];
            foreach ($array as $value) {
                $numberList[] = $value * 2;
            }
            return $numberList;
        }

        var_dump(getMultiplyBy2($array));

        function getMultiplyBy2b(array $array): array
        {
            // return array_map(function ($value) {
            //     return $value * 2;
            // }, $array);
            return array_map(fn ($value) => $value * 2, $array);
        }
        var_dump(getMultiplyBy2b($array));

        ?>
    </div>
</section>

<!-- QUESTION 4 bis -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 4 bis</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et un entier. La fonction doit retourner les valeurs du tableau divisées par le second paramètre</p>
    <div class="exercice-sandbox">
        <?php

        function divideArray(array $array, int $integer): array
        {
            // $newArray = [];
            // foreach ($array as $value) {
            //     $newArray[] = $value / $integer;
            // }
            // return $newArray;

            return array_map(fn ($value) => $value / $integer, $array);
        }

        var_dump(divideArray($array, 9));
        ?>
    </div>
</section>

<!-- QUESTION 5 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 5</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers ou de chaînes de caractères et retourne le tableau sans doublons</p>
    <div class="exercice-sandbox">
        <?php
        var_dump(array_unique($arrayA));

        function getArrayWithoutDuplication(array $array): array
        {
            $newArray = [];
            foreach ($array as $key => $value) {
                if (!in_array($value, $newArray)) {
                    $newArray[$key] = $value;
                }
            }
            return $newArray;
        }

        var_dump(getArrayWithoutDuplication($arrayA));


        ?>
    </div>
</section>

<!-- QUESTION 6 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 6</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre 2 tableaux et retourne un tableau représentant l'intersection des 2</p>
    <div class="exercice-sandbox">
        <?php
        var_dump(array_intersect($arrayA, $arrayB));

        function getIntersection(array $arrayA, array $arrayB): array
        {
            $array = [];
            foreach ($arrayA as $key => $value) {
                if (in_array($value, $arrayB)) {
                    $array[$key] = $value;
                }
            }
            return $array;
        }

        var_dump(getIntersection($arrayA, $arrayB));

        ?>
    </div>
</section>

<!-- QUESTION 7 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 7</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre 2 tableaux et retourne un tableau des valeurs du premier tableau qui ne sont pas dans le second</p>
    <div class="exercice-sandbox">
        <?php

        var_dump(array_diff($arrayA, $arrayB));

        /**
         * Undocumented function
         *
         * @param array $arrayA
         * @param array $arrayB
         * @param boolean $unique
         * @return array
         */
        function getDifference(array $arrayA, array $arrayB, bool $unique = false): array
        {
            $array = [];
            foreach ($arrayA as $key => $value) {
                if (!in_array($value, $arrayB)) {
                    $array[$key] = $value;
                }
            }
            if ($unique) return array_unique($array);
            return $array;
        }

        var_dump(getDifference($arrayA, $arrayB));

        ?>
    </div>
</section>


<!-- QUESTION 8 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 8</h2>
    <p class="exercice-txt">Réécrire la fonction précédente pour lui ajouter un paramètre booléen facultatif. Si celui-ci est à true, le tableau retourné sera sans doublons</p>
    <div class="exercice-sandbox">
        <?php
        var_dump(getDifference($arrayA, $arrayB, true));
        ?>
    </div>
</section>


<!-- QUESTION 9 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 9</h2>
    <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau et un entier et retourne les n premiers éléments du tableau.</p>
    <div class="exercice-sandbox">
        <?php
        function getNValuesFromArray(array $array, int $length): array
        {
            return array_slice($array, 0, $length);
        }

        var_dump(getNValuesFromArray($array, 4));

        ?>
    </div>
</section>
<?php

include 'includes/_footer.php';
