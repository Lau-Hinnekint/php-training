<?php

require 'includes/_config.php';
require 'includes/_functions.php';

include 'includes/_header.php';


$fruits = ["fraise", "banane", "pomme", "cerise", "ananas"];

$prices = [3, 2, 2, 5, 8];


?>

<!-- QUESTION 1 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 1</h2>
    <p class="exercice-txt">Ordonner le tableau des prix par ordre croissant et l'afficher en détail</p>
    <div class="exercice-sandbox">
        <?php

        sort($prices);
        var_dump($prices);

        ?>
    </div>
</section>

<!-- QUESTION 2 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 2</h2>
    <p class="exercice-txt">Ajouter 1 euro à chaque prix</p>
    <div class="exercice-sandbox">
        <?php

        // foreach($prices as $i => $price) {
        //     $prices[$i]++;
        // }

        for ($i = 0; $i < sizeof($prices); $i++) {
            $prices[$i]++;
        }

        var_dump($prices);

        ?>
    </div>
</section>

<!-- QUESTION 3 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 3</h2>
    <p class="exercice-txt">Créer le tableau $store qui combine les tableaux des fruits et des prix afin d'obtenir un tableau associatif d'attribution des prix. Afficher le tableau obtenu</p>
    <div class="exercice-sandbox">
        <?php

        $store = array_combine($fruits, $prices);

        var_dump($store);

        // $store = [];

        // if (sizeof($fruits) === sizeof($prices)) {
        //     foreach ($fruits as $i => $fruit) {
        //         $store[$fruit] = $prices[$i];
        //     } 
        // }

        // var_dump($store);

        ?>
    </div>
</section>

<!-- QUESTION 4 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 4</h2>
    <p class="exercice-txt">Afficher dans une liste HTML le nom des fruits ayant un prix inférieur à 4 euros</p>
    <div class="exercice-sandbox">
        <ul>
            <?php
            // for ($i = 0; $i < count($fruits); $i++) {
            //     if ($prices[$i] < 4) {
            //         echo "<li>$fruits[$i] = $prices[$i] €</li>";
            //     }
            // }

            foreach ($store as $fruit => $price) {
                if ($price < 4) {
                    echo "<li>$fruit = $price</li>";
                }
            }

            ?>

        </ul>
    </div>
</section>

<!-- QUESTION 5 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 5</h2>
    <p class="exercice-txt">Afficher dans une liste HTML le nom des fruits ayant un prix pair</p>
    <div class="exercice-sandbox">
        <ul>
            <?php
            foreach ($store as $fruit => $price) {
                if ($price % 2 == 0) {
                    echo "<li>$fruit = $price</li>";
                }
            }
            ?>
        </ul>
    </div>
</section>

<!-- QUESTION 6 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 6</h2>
    <p class="exercice-txt">Composer un panier de fruits ne dépassant pas 12 euros, en sélectionnant chaque fruit dans l'ordre actuel.</p>
    <div class="exercice-sandbox">
        <?php
        $basket = [];
        $basketOfFruits = [];

        foreach ($store as $fruit => $price) {
            if ((array_sum($basket) + $price) <= 12) {
                // array_push($basket, $price);
                $basket[] = $price;
                // array_push($basketOfFruits, $fruit);
                $basketOfFruits[] = $fruit;
            }
        }


        $basket = [];
        foreach ($store as $fruit => $price) {
            if ((array_sum($basket) + $price) <= 12) {
                $basket[$fruit] = $price;
            }
        }

        var_dump($basket);
        ?>

    </div>
</section>

<!-- QUESTION 7 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 7</h2>
    <p class="exercice-txt">En reprenant le prix total du panier constitué à la question précédente, appliquez-lui une taxe de 18%. Afficher le total taxe comprise.</p>
    <div class="exercice-sandbox">
        <?php
        var_dump(array_sum($basket) * 1.18);

        $totalBasket = array_sum($basket);
        $totalBasket *= 1.18;
        var_dump($totalBasket);
        ?>
    </div>
</section>

<!-- QUESTION 8 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 8</h2>
    <p class="exercice-txt">Ajouter au tableau $store le fruit "kiwi" pour un prix de 1,50 € puis afficher le tableau complet</p>
    <div class="exercice-sandbox">
        <?php
        $store['kiwi'] = 1.50;
        var_dump($store);
        ?>
    </div>
</section>

<!-- QUESTION 9 -->
<?php
$newFruits = [
    "pêche" => 3,
    "abricot" => 2,
    "mangue" => 9
];
?>
<section class="exercice">
    <h2 class="exercice-ttl">Question 9</h2>
    <p class="exercice-txt">Ajouter les nouveaux fruits du tableau $newFruits au tableau $store</p>
    <div class="exercice-sandbox">
        <?php
        $store = array_merge($store, $newFruits);
        var_dump($store);
        ?>
    </div>
</section>

<!-- QUESTION 10 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 10</h2>
    <p class="exercice-txt">Afficher le nom et le prix du fruit le moins cher</p>
    <div class="exercice-sandbox">
        <?php

        foreach ($store as $fruit => $price) {
            if (!isset($minFruit) || $store[$minFruit] > $price) {
                $minFruit = $fruit;
            }
        }

        var_dump($minFruit, $store[$minFruit]);
        ?>
    </div>
</section>

<!-- QUESTION 11 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 11</h2>
    <p class="exercice-txt">Afficher les noms et le prix des fruits les plus chers</p>
    <div class="exercice-sandbox">
        <?php

        foreach ($store as $fruit => $price) {
            if (!isset($maxFruits) || $store[$maxFruits[0]] < $price) {
                $maxFruits = [$fruit];
            } else if ($store[$maxFruits[0]] === $price) {
                $maxFruits[] = $fruit;
            }
        }

        var_dump($maxFruits, $store[$maxFruits[0]]);
        ?>
    </div>
</section>
<?php

include 'includes/_footer.php';
