<?php

$fruits = ["fraise", "banane", "pomme", "cerise", "abricot", "pêche", "ananas", "kiwi"];

?>
<?php
$title = "Exo 2";
require 'header.php';
?>
<!-- QUESTION 1 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 1</h2>
    <p class="exercice-txt">Afficher le détail de tout le tableau de fruits</p>
    <div class="exercice-sandbox">
        <?php

        var_dump($fruits);

        ?>
    </div>
</section>

<!-- QUESTION 2 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 2</h2>
    <p class="exercice-txt">Afficher les fruits dans une liste HTML non ordonnée</p>
    <div class="exercice-sandbox">
        <?php
        echo "<ul>";
        foreach ($fruits as $fruit) {
            echo "<li> $fruit </li>";
        };
        echo "</ul>";
        ?>

    </div>
</section>

<!-- QUESTION 3 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 3</h2>
    <p class="exercice-txt">Afficher les fruits dans une liste HTML non ordonnée avec pour chacun d'eux sa position dans la liste</p>
    <div class="exercice-sandbox">
        <?php
        echo "<ul>";
        for ($i = 0; $i < sizeof($fruits); $i++) {
            $position = $i + 1;
            echo "<li> $fruits[$i] : position n°${position} dans la liste </li>";
            echo "</ul>";
        }
        ?>
    </div>
</section>

<!-- QUESTION 4 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 4</h2>
    <p class="exercice-txt">Afficher 1 fruit sur 2 dans une liste HTML, en commençant par la fraise</p>
    <div class="exercice-sandbox">
        <?php
        for ($i = 0; $i < sizeof($fruits); $i++) {
            if ($i % 2 == 0) {
                echo "<li> $fruits[$i]</li>";
            }
        }
        ?>
    </div>
</section>

<!-- QUESTION 5 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 5</h2>
    <p class="exercice-txt">Afficher un fruit aléatoire du tableau</p>
    <div class="exercice-sandbox">
        <?php
        $rand_key = array_rand($fruits);
        echo $fruits[$rand_key];
        ?>
    </div>
</section>

<!-- QUESTION 6 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 6</h2>
    <p class="exercice-txt">Afficher les fruits dans un ordre aléatoire</p>
    <div class="exercice-sandbox">
        <?php
        $fruits2 = ["fraise", "banane", "pomme", "cerise", "abricot", "pêche", "ananas", "kiwi"];
        shuffle($fruits2);
        foreach ($fruits2 as $value) {
            echo "<li> $value</li>";
        }
        ?>
    </div>
</section>

<!-- QUESTION 7 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 7</h2>
    <p class="exercice-txt">Afficher les fruits dont la chaîne de caractère est composée de 5 caractères au maximum</p>
    <div class="exercice-sandbox">
        <?php
        for ($i = 0; $i < sizeof($fruits); $i++) {
            if (strlen($fruits[$i]) <= 5) {
                echo "<li> $fruits[$i]</li>";
            }
        }
        ?>
    </div>
</section>

<!-- QUESTION 8 -->
<?php
$breakfast = "Tous les matins je mange une pomme et une banane avec une cuillère de miel.";
?>
<section class="exercice">
    <h2 class="exercice-ttl">Question 8</h2>
    <p class="exercice-txt">Dans la phrase suivante : "<?= $breakfast ?>"</p>
    <p class="exercice-txt">Remplacez pomme par pêche et banane par mangue et affichez-la.</p>
    <div class="exercice-sandbox">
        <?php
        $old = ["pomme", "banane"];
        $new = ["pêche", "mangue"];
        echo str_replace($old, $new, $breakfast);
        ?>
    </div>
</section>

<!-- QUESTION 9 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 9</h2>
    <p class="exercice-txt">Affichez la chaîne de caractère composée de l'ensemble des fruits de la liste, séparés par une virgule et un espace.</p>
    <div class="exercice-sandbox">
        <?php
        echo implode(", ", $fruits);
        ?>
    </div>
</section>

<!-- QUESTION 10 -->
<?php

$salad = "Dans ma salade de fruit préférée, il y a de la banane, des pêches, quelques fraises, des noix et une cuillère de miel.";

?>
<section class="exercice">
    <h2 class="exercice-ttl">Question 10</h2>
    <p class="exercice-txt">Afficher dans une liste HTML tous les fruits de la liste qui apparaissent dans la phrase suivante : "<?= $salad ?>"</p>
    <div class="exercice-sandbox">
        <?php
        for ($i = 0; $i < sizeof($fruits); $i++) {
            if (str_contains($salad, $fruits[$i])) {
                echo "<li> $fruits[$i]</li>";
            }
        }
        ?>
    </div>
</section>
</div>
<?php
require 'footer.php';
?>
</body>

</html>