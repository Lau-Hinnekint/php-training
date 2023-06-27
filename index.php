<?php

require 'includes/_config.php';
require 'includes/_functions.php';

include 'includes/_header.php';

?>


<!-- QUESTION 1 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 1</h2>
    <p class="exercice-txt">Ecrivez la phrase suivante dans une balise HTML P en utilisant les 2 variables ci-dessous :</p>
    <p class="exercice-txt">"<i>Firstname</i> a obtenu <i>score</i> points à cette partie."</p>
    <div class="exercice-sandbox">

        <?php
        $firstname = "Michel";
        $score = 327;
        echo "<p>$firstname a obtenu $score points à cette partie.</p>";
        ?>
    </div>
</section>


<!-- QUESTION 2 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 2</h2>
    <p class="exercice-txt">Afficher dans une liste HTML le nom des produits suivants et leurs prix.</p>
    <div class="exercice-sandbox">
        <?php
        $nameProduct1 = "arc";
        $priceProduct1 = 10.30;
        $nameProduct2 = "flèche";
        $priceProduct2 = 2.90;
        $nameProduct3 = "potion";
        $priceProduct3 = 5.20;
        echo "<ul>
                <li>article: $nameProduct1 prix: $priceProduct1</li>
                <li>article: $nameProduct2 prix: $priceProduct2</li>
                <li>article: $nameProduct3 prix: $priceProduct3</li>
                </ul>"
        ?>
    </div>
</section>

<!-- QUESTION 3 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 3</h2>
    <p class="exercice-txt">Calculer le montant total de la commande des produits ci-dessus avec les quantités ci-dessous et appliquez lui une remise de 10%.</p>
    <div class="exercice-sandbox">
        <?php
        $quantityProduct1 = 1;
        $quantityProduct2 = 10;
        $quantityProduct3 = 4;
        // $total = ($quantityProduct1 * $priceProduct1) + ($quantityProduct2 * $priceProduct2) + ($quantityProduct3 * $priceProduct3);

        $total = $quantityProduct1 * $priceProduct1;
        $total += $quantityProduct2 * $priceProduct2;
        $total += $quantityProduct3 * $priceProduct3;
        $total *= 0.9;
        echo $total;
        ?>
    </div>
</section>


<!-- QUESTION 4 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 4</h2>
    <p class="exercice-txt">Affichez le prix le plus élevé des 3 produits ci-dessus.</p>
    <div class="exercice-sandbox">
        <?php
        echo max($priceProduct1, $priceProduct2, $priceProduct3);
        ?>
    </div>
</section>

<!-- QUESTION 5 -->
<?php

$text1 = "Le marchand m'a vendu un arc et des flèches.";

?>
<section class="exercice">
    <h2 class="exercice-ttl">Question 5</h2>
    <p class="exercice-txt">Affichez dans une liste HTML le nom des produits de la question 2 qui sont présents dans la phrase : "<?= $text1 ?>"</p>
    <div class="exercice-sandbox">

        <ul>
            <?php

            if (str_contains($text1, $nameProduct1)) {
                echo "<li>$nameProduct1</li>";
            }
            if (str_contains($text1, $nameProduct2)) {
                echo "<li>$nameProduct2</li>";
            }
            if (str_contains($text1, $nameProduct3)) {
                echo "<li>$nameProduct3</li>";
            }

            ?></ul>
    </div>
</section>

<!-- QUESTION 6 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 6</h2>
    <p class="exercice-txt">Parmis les scores suivants, affichez le prénom des joueurs qui ont obtenus entre 50 et 150 points.</p>
    <div class="exercice-sandbox">
        <?php
        $namePlayer1 = "Tim";
        $scorePlayer1 = 67;
        $namePlayer2 = "Morgan";
        $scorePlayer2 = 198;
        $namePlayer3 = "Hamed";
        $scorePlayer3 = 21;
        $namePlayer4 = "Camille";
        $scorePlayer4 = 134;
        $namePlayer5 = "Kevin";
        $scorePlayer5 = 103;

        echo '<ul>';

        if ($scorePlayer1 > 50 && $scorePlayer1 < 150) {
            echo "<li> $namePlayer1 </li>";
        }
        if ($scorePlayer2 > 50 && $scorePlayer2 < 150) {
            echo "<li> $namePlayer2 </li>";
        }
        if ($scorePlayer3 > 50 && $scorePlayer3 < 150) {
            echo "<li> $namePlayer3 </li>";
        }
        if ($scorePlayer4 > 50 && $scorePlayer4 < 150) {
            echo "<li> $namePlayer4 </li>";
        }
        if ($scorePlayer5 > 50 && $scorePlayer5 < 150) {
            echo "<li> $namePlayer5 </li>";
        }

        echo '</ul>';

        ?>
    </div>
</section>


<!-- QUESTION 7 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 7</h2>
    <p class="exercice-txt">En réutilisant les scores de la question précédente, afficher le nom du joueur ayant obtenu le plus grand score.</p>
    <div class="exercice-sandbox">
        <?php
        $scoreMax = max($scorePlayer1, $scorePlayer2, $scorePlayer3, $scorePlayer4, $scorePlayer5);
        // var_dump($scoreMax);

        if ($scoreMax === $scorePlayer1) {
            $winner = $namePlayer1;
        }
        if ($scoreMax === $scorePlayer2) {
            $winner = $namePlayer2;
        }
        if ($scoreMax === $scorePlayer3) {
            $winner = $namePlayer3;
        }
        if ($scoreMax === $scorePlayer4) {
            $winner = $namePlayer4;
        }
        if ($scoreMax === $scorePlayer5) {
            $winner = $namePlayer5;
        }
        echo "Le gagnant est : $winner";
        ?>
    </div>
</section>


<!-- QUESTION 8 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 8</h2>
    <p class="exercice-txt">Affichez le prénom du joueur le plus long en nombre de caractères.</p>
    <div class="exercice-sandbox">
        <?php
        // var_dump($namePlayer1);
        $namePlayerLen1 = strlen($namePlayer1);
        // var_dump($namePlayer2);
        $namePlayerLen2 = strlen($namePlayer2);
        // var_dump($namePlayer3);
        $namePlayerLen3 = strlen($namePlayer3);
        // var_dump($namePlayer4);
        $namePlayerLen4 = strlen($namePlayer4);
        // var_dump($namePlayer5);
        $namePlayerLen5 = strlen($namePlayer5);

        $maxLen = max($namePlayerLen1, $namePlayerLen2, $namePlayerLen3, $namePlayerLen4, $namePlayerLen5);
        // var_dump($maxLen);

        if ($maxLen === $namePlayerLen1) {
            $winnerLen = $namePlayer1;
        }
        if ($maxLen === $namePlayerLen2) {
            $winnerLen = $namePlayer2;
        }
        if ($maxLen === $namePlayerLen3) {
            $winnerLen = $namePlayer3;
        }
        if ($maxLen === $namePlayerLen4) {
            $winnerLen = $namePlayer4;
        }
        if ($maxLen === $namePlayerLen5) {
            $winnerLen = $namePlayer5;
        }

        echo $winnerLen . " a le plus grand nombre de caractères";

        ?>
    </div>
</section>

<!-- QUESTION 9 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 9</h2>
    <p class="exercice-txt">Créer une variable $players ayant pour valeur un tableau multidimensionnel contenant toutes les données des joueurs avec leurs scores ci-dessus et leurs ages ci-dessous.</p>
    <ul class="exercice-txt">
        <li>Tim : 25 ans</li>
        <li>Morgan : 34 ans</li>
        <li>Hamed : 27 ans</li>
        <li>Camille : 47 ans</li>
        <li>Kevin : 31 ans</li>
    </ul>
    <p class="exercice-txt">Afficher la valeur de cette variable avec tous les détails.</p>
    <div class="exercice-sandbox">
        <?php
        $players = [
            ["name" => "Tim", "age" =>  25, "scores" => 67],
            ["name" => "Morgan", "age" =>  34, "scores" => 198],
            ["name" => "Hamed", "age" =>  27, "scores" => 21],
            ["name" => "Camille", "age" =>  47, "scores" => 134],
            ["name" => "Kevin", "age" =>  31, "scores" => 103]
        ];
        var_dump($players);
        ?>
    </div>
</section>

<!-- QUESTION 10 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 10</h2>
    <p class="exercice-txt">Afficher le prénom et l'âge du joueur le plus jeune dans une phrase dans une balise HTML P.</p>
    <div class="exercice-sandbox">
        <?php
        for ($i = 0; $i < sizeof($players); $i++) {
            if (!isset($ageYounger) || $players[$i]['age'] < $ageYounger) {
                $ageYounger = $players[$i]['age'];
                $nameYounger = $players[$i]['name'];
            }
        }

        echo "<p> Le joueur le plus jeune est $nameYounger et son age est de $ageYounger.</p>";

        for ($i = 0; $i < sizeof($players); $i++) {
            if (!isset($youngerIndex) || $players[$i]['age'] < $players[$youngerIndex]['age']) {
                $youngerIndex = $i;
            }
        }

        echo "<p> Le joueur le plus jeune est {$players[$youngerIndex]['name']} et son age est de {$players[$youngerIndex]['age']}.</p>";

        $ageYounger3 = $players[0]['age'];
        foreach ($players as $player) {
            if ($player['age'] <= $ageYounger3) {
                $ageYounger3 = $player['age'];
                $nameYounger3 = $player['name'];
            }
        }
        echo "<p> Le joueur le plus jeune est $nameYounger3 et son age est de $ageYounger3.</p>";

        foreach ($players as $player) {
            if (!isset($ageYounger2) || $player['age'] <  $ageYounger2) {
                $ageYounger2 = $player['age'];
                $nameYounger2 = $player['name'];
            }
        }
        echo "<p> Le joueur le plus jeune est $nameYounger2 et son age est de $ageYounger2.</p>";


        foreach ($players as $index => $player) {
            if (!isset($youngerIndex2) || $player['age'] <  $players[$youngerIndex2]['age']) {
                $youngerIndex2 = $index;
            }
        }
        echo "<p> Le joueur le plus jeune est {$players[$youngerIndex2]['name']} et son age est de $ageYounger2.</p>";


        foreach ($players as $player) {
            if (!isset($youngerPlayer) || $player['age'] <  $youngerPlayer['age']) {
                $youngerPlayer = $player;
            }
        }
        echo "<p> Le joueur le plus jeune est {$youngerPlayer['name']} et son age est de {$youngerPlayer['age']}.</p>";


        ?>
    </div>
</section>
<?php

include 'includes/_footer.php';
