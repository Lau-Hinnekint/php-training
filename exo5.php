<?php

// Json file
try {
    $fileContent = file_get_contents("datas/series.json");
    $series = json_decode($fileContent, true);
} catch (Exception $e) {
    echo "Something went wrong with json file...";
    exit;
}

?>

<?php
$title = "Exo 5";
require 'header.php';
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
        function getUnique(array $array): array
        {
            return array_unique($array);
        }
        $platforms = [];
        foreach ($series as $serie) {
            if (isset($serie['availableOn'])) {
                $platforms[] = $serie['availableOn'];
            }
        }
        sort($platforms);
        // var_dump(getUnique($platforms));
        $htmlList = array_map(fn ($v) => "<li>$v</li>", $platforms);
        echo implode(getUnique($htmlList));
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
        if (isset($_GET['style'])) {
            $requestedStyle = $_GET['style'];
            $filteredSeries = array_filter($series, function ($serie) use ($requestedStyle) {
                return in_array($requestedStyle, $serie['styles']);
            });

            if (!empty($filteredSeries)) {
                echo '<div class="series-container">';
                foreach ($filteredSeries as $serie) {
                    echo getHTMLFromSerie($serie);
                }
                echo '</div>';
            }
        } else {

            echo '<div class="series-container">';
            foreach ($series as $serie) {
                echo getHTMLFromSerie($serie);
            }
            echo '</div>';
        }

        $style = isset($_GET['style']) ? $_GET['style'] : null;
        if (is_null($style)) {
            $seriesFilter = $series;
        } else {
            $seriesFilter = array_filter($series, fn ($serie) => in_array($style, $serie['styles']));
        }
        $var = array_map('getHTMLFromSerie', $seriesFilter);
        echo getListFromArray($var, 'series-container', 'serie');
        ?>
    </div>
</section>

<!-- QUESTION 3 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 3</h2>
    <p class="exercice-txt">Ajouter un lien aux séries listées ci-dessus menant à cette page avec en paramètre "serie", l'identifiant de la série</p>
    <div class="exercice-sandbox">
        <?php
        foreach ($series as $serie) {
            if (isset($_GET["id"])) {
                if ($_GET["id"] == $serie["id"]) {
                    echo $serie["name"] . " : " . $serie["id"];
                }
            }
        }
        function getSerieFromId($series)
        {
            foreach ($series as $serie) {
                if (isset($_GET["id"])) {
                    if ($_GET["id"] == $serie["id"]) {
                        return $serie["name"] . " : " . $serie["id"];
                    }
                }
            }
        }
        ?>
    </div>
</section>


<!-- QUESTION 4 -->
<section id="question4" class="exercice">
    <h2 class="exercice-ttl">Question 4</h2>
    <p class="exercice-txt">Si l'URL de la page appelée comporte l'identifiant d'une série, alors afficher toutes les informations de la série ci-dessous.</p>
    <p class="exercice-txt">Si l'identifiant ne correspond à aucune série, afficher un message d'erreur.</p>
    <div id="exo4" class="exercice-sandbox">
        <?php
        function showDataFromSerie($serie)
        {
            $html = '<ul>';
            foreach ($serie as $k => $v) {
                if ($k === 'image') {
                    $html .= '<li>' . $k . ': <img src="' . $v . '" alt="' . $serie['name'] . '"></li>';
                } elseif (is_bool($v)) {
                    $html .= '<li>' . $k . ': ' . ($v ? 'Yes' : 'No') . '</li>';
                } elseif (is_array($v)) {
                    $html .= '<li>' . $k . ': ' . showDataFromSerie($v) . '</li>';
                } else {
                    $html .= '<li>' . $k . ': ' . $v . '</li>';
                }
            }
            $html .= '</ul>';
            return $html;
        }
        foreach ($series as $serie) {
            if (isset($_GET["id"])) {
                if ($_GET["id"] == $serie["id"]) {
                    echo showDataFromSerie($serie);
                }
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
        <?php

        // $styles = [];
        // if (isset($_GET['id'])) {
        //     $serieId = $_GET['id'];
        //     if (isset($series[$serieId - 1])) {
        //         $serie = $series[$serieId - 1];
        //         foreach ($series as $serie) {
        //             $styles = array_merge($styles, $serie['styles']);
        //         }
        //         $styles = array_unique($styles);
        //         sort($styles);

        //         echo '<ul>';
        //         foreach ($styles as $style) {
        //             echo '<li>' . $style . '</li>';
        //         }
        //         echo '</ul>';
        //     }
        // }

        //-------------------------------------------------------------

        $styles = [];

        for ($i = 0; $i < count($series); $i++) {
            for ($a = 0; $a < count($series[$i]["styles"]); $a++) {
                $styles[] = $series[$i]["styles"][$a];
            }
        }
        $uniqueStyles = array_unique($styles);
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

        // $count = [];

        // for ($i = 0; $i < count($styles); $i++) {
        //     for ($a = 0; $a < count($series); $a++) {
        //         for ($b = 0; $b < count($series[$a]["styles"]); $b++) {
        //             if ($styles[$i] === $series[$a]["styles"][$b]) {
        //                 $entity = $series[$a]["styles"][$b];
        //                 if (isset($count[$entity])) {
        //                     $count[$entity]++;
        //                 } else {
        //                     $count[$entity] = 1;
        //                 }
        //             }
        //         }
        //     }
        // }
        // foreach ($count as $entity => $c) {
        //     $encode = urlencode($entity);
        //     echo "<a href=exo5.php?" . "style=$encode#exo7>$entity($c)</a><br>";
        // }

        $styles = [];

        for ($i = 0; $i < count($series); $i++) {
            for ($a = 0; $a < count($series[$i]["styles"]); $a++) {
                $styles[] = $series[$i]["styles"][$a];
            }
        }

        $stylesCount = array_count_values($styles);
        $uniqueStyles = array_unique($styles);
        sort($uniqueStyles);

        // echo getListFromArray(array_map(fn ($s, $n) => "$s ($n)", array_keys($stylesCount), array_values($stylesCount)));
        echo getListFromArray(array_map(fn ($s, $n) => '<a href="?style=' . urlencode($s) . '">' . $s . '</a> (' . $n . ')', array_keys($stylesCount), array_values($stylesCount)));


        // echo '<ul>';
        // foreach ($uniqueStyles as $style) {
        //     $count = $stylesCount[$style];
        //     $url = "exo5.php" . '?style=' . urlencode($style);
        //     echo '<li><a href="' . $url . '">' . $style . ' (' . $count . ')</a></li>';
        // }
        // echo '</ul>';


        ?>
    </div>
</section>

<!-- QUESTION 7 -->
<section id="exo7" class="exercice">
    <h2 class="exercice-ttl">Question 7</h2>
    <p class="exercice-txt">Ajoutez un lien à chaque nom de style ci-dessus menant à cette page avec en paramètre "style" le nom du style.</p>
    <div class="exercice-sandbox">
        <?php
        if (isset($_GET['style'])) {
            echo $_GET['style'];
        } else {
            echo 'pas de style';
        }
        // $styleSerie = $_GET['style'];
        // echo $styleSerie;
        ?>
    </div>
</section>

<!-- QUESTION 8 -->
<section class="exercice">
    <h2 class="exercice-ttl">Question 8</h2>
    <p class="exercice-txt">Si l'URL de la page appelée comporte un style, affichez à la Question 2 uniquement les séries de ce style.</p>
    <div class="exercice-sandbox">
        <?php
        if (isset($_GET['style'])) {
            echo 'ça marche';
        } else {
            echo 'pas d\'url';
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