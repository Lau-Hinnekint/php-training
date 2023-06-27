<?php

require 'includes/_config.php';
require 'includes/_functions.php';

include 'includes/_header.php';

// Json file
try {
    $fileContent = file_get_contents("datas/series.json");
    $series = json_decode($fileContent, true);
} catch (Exception $e) {
    echo "Something went wrong with json file...";
    exit;
}

?>


<section class="exercice">
    Sur cette page un fichier comportant les données de séries télé est importé côté serveur. (voir datas/series.json)
    Les données sont accessibles dans la variable $series.
</section>

<!-- QUESTION 1 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 1</h2>
    <p class="exercice-txt">Récupérer dans un tableau puis afficher l'ensemble des plateformes de diffusion des séries. Afficher les par ordre alphabétique.</p>
    <div class="exercice-sandbox">
        <?php
        // $getAvailableOn = function ($serie) {
        //     return $serie['availableOn'];
        // };
        // $availableOn = array_unique(array_map($getAvailableOn, $series));

        $availableOn = array_unique(array_map(fn ($serie) => $serie['availableOn'], $series));
        sort($availableOn);

        // echo implode("\n", $availableOn);
        echo getListFromArray($availableOn);

        $platforms = [];
        foreach ($series as $serie) {
            $platforms[] = $serie['availableOn'];
        }

        sort($platforms);

        // var_dump(array_unique($platforms));
        echo getListFromArray(array_unique($platforms));

        ?>
    </div>
</section>

<!-- QUESTION 2 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 2</h2>
    <p class="exercice-txt">Afficher la liste de toutes les séries avec l'image principale et son titre</p>
    <p class="exercice-txt">Afficher une seule série par ligne sur les plus petits écrans, 2 séries par ligne sur les écrans intermédiaires et 4 séries par ligne sur un écran d'ordinateur.</p>
    <div class="exercice-sandbox">
        <?php
        // echo '<ul class="serie-list">';
        // foreach ($series as $serie) {
        //     // echo $serie['id'];
        //     echo '<li class="serie-item"><h3>'.$serie['name'].'</h3>';
        //     echo '<img class="serie-img" src="'.$serie['image'].'" alt=""></li>';
        // }
        // echo '</ul>';


        $style = isset($_GET['style']) ? urldecode($_GET['style']) : null;

        if (is_null($style)) {
            $seriesFilter = $series;
        } else {
            $seriesFilter = array_filter($series, fn ($serie) => in_array($style, $serie['styles']));
        }

        $var = array_map('getHtmlFromSerie', $seriesFilter);
        echo getListFromArray($var, 'serie-list', 'serie-item');

        ?>

    </div>
</section>

<!-- QUESTION 3 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 3</h2>
    <p class="exercice-txt">Ajouter un lien aux séries listées ci-dessus menant à cette page avec en paramètre "serie", l'identifiant de la série</p>
    <div class="exercice-sandbox">

    </div>
</section>


<!-- QUESTION 4 -->
<section id="question4" class="exercice">
    <h2 class="exercice-ttl">Question 4</h2>
    <p class="exercice-txt">Si l'URL de la page appelée comporte l'identifiant d'une série, alors afficher toutes les informations de la série ci-dessous.</p>
    <p class="exercice-txt">Si l'identifiant ne correspond à aucune série, afficher un message d'erreur.</p>
    <div class="exercice-sandbox">
        <?php

        $id = isset($_GET['serie']) ? intval($_GET['serie']) : null;
        if (is_null($id)) {
            echo '<p class="warning-msg">Aucune série sélectionnée.</p>';
        } else {
            $serie = getSerieFromId($id);
            if (is_null($serie)) {
                echo '<p class="warning-msg">Cette série est introuvable.</p>';
            } else {
                echo '<article>';
                foreach ($serie as $key => $value) {
                    if (is_array($value)) {
                        echo "<p>$key : " . implode(', ', $value) . "</p>";
                    } else if (is_bool($value)) {
                        echo "<p>$key : " . ($value ? 'oui' : 'non') . "</p>";
                    } else if ($key === 'image') {
                        echo '<img src="' . $value . '">';
                    } else {
                        echo "<p>$key : $value</p>";
                    }
                }
                echo '</article>';
            }
        }

        ?>
    </div>
</section>

<!-- QUESTION 5 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 5</h2>
    <p class="exercice-txt">Récupérer dans un tableau l'ensemble des styles de séries dans une liste HTML. Afficher les par ordre alphabétique dans une liste HTML.</p>
    <div class="exercice-sandbox">
        <ul>

            <?php
            // var_dump($series);

            $styles = [];
            foreach ($series as $serie) {
                foreach ($serie['styles'] as $index => $style) {
                    if (!in_array($style, $styles)) {
                        $styles[] = $style;
                        echo '<li>' . $style . '</li>';
                    }
                }
            }
            ?>
        </ul>

        <br>

        <?php

        $arrayStyles = array_map(fn ($serie) => $serie['styles'], $series);

        $mergeStyles = array_merge(...$arrayStyles);

        $uniqueStyles = array_unique($mergeStyles);

        sort($uniqueStyles);

        echo getListFromArray($uniqueStyles);
        ?>
    </div>
</section>

<!-- QUESTION 6 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 6</h2>
    <p class="exercice-txt">Ajoutez après chaque style de la liste ci-dessus, le nombre de séries correspondantes entre parenthèses.</p>
    <div class="exercice-sandbox">
        <?php
        $stylesCount = array_count_values($mergeStyles);
        // var_dump($stylesCount);

        // echo '<ul>';
        // foreach ($stylesCount as $style => $nb) {
        //     echo '<li>'.$style.' ('.$nb.')</li>';
        // }
        // echo '</ul>';


        echo getListFromArray(array_map(fn ($s, $n) => '<a href="?style=' . urlencode($s) . '">' . $s . '</a> (' . $n . ')', array_keys($stylesCount), array_values($stylesCount)));
        ?>
    </div>
</section>

<!-- QUESTION 7 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 7</h2>
    <p class="exercice-txt">Ajoutez un lien à chaque nom de style ci-dessus menant à cette page avec en paramètre "style" le nom du style.</p>
    <div class="exercice-sandbox">

    </div>
</section>

<!-- QUESTION 8 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 8</h2>
    <p class="exercice-txt">Si l'URL de la page appelée comporte un style, affichez à la Question 2 uniquement les séries de ce style.</p>
    <div class="exercice-sandbox">

    </div>
</section>
<?php

include 'includes/_footer.php';
