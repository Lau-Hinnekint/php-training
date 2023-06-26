<?php

require 'includes/_functions.php';

// Json file
try {
    $fileContent = file_get_contents("datas/series.json");
    $series = json_decode($fileContent, true);
} catch (Exception $e) {
    echo "Something went wrong with json file...";
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Introduction PHP - Exo 5</title>
</head>

<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Introduction PHP - Exo 5</h1>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a href="index.php" class="main-nav-link">Entrainement</a></li>
                    <li><a href="exo2.php" class="main-nav-link">Donnez moi des fruits</a></li>
                    <li><a href="exo3.php" class="main-nav-link">Donnez moi de la thune</a></li>
                    <li><a href="exo4.php" class="main-nav-link">Donnez moi des fonctions</a></li>
                    <li><a href="exo5.php" class="main-nav-link active">Netflix</a></li>
                    <li><a href="exo6.php" class="main-nav-link">Mini-site</a></li>
                </ul>
            </nav>
        </header>

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

                $var = array_map('getHtmlFromSerie', $series);
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
                        }
                        else {
                            echo '<article>';
                            foreach ($serie as $key => $value) {
                                if (is_array($value)) {
                                    echo "<p>$key : ".implode(', ', $value)."</p>";
                                }
                                else if (is_bool($value)) {
                                    echo "<p>$key : ".($value ? 'oui' : 'non')."</p>";
                                }
                                else if ($key === 'image') {
                                    echo '<img src="'.$value.'">';
                                }
                                else {
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

            </div>
        </section>

        <!-- QUESTION 6 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Ajoutez après chaque style de la liste ci-dessus, le nombre de séries correspondantes entre parenthèses.</p>
            <div class="exercice-sandbox">

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

    </div>
    <div class="copyright">© Guillaume Belleuvre, 2023 - DWWM</div>
</body>

</html>