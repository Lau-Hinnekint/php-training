<?php
$title = "Exo 6";
require 'header.php';
?>

<section class="exercice">
    Les questions suivantes ont pour vocation a faire évoluer et à généraliser la structure du code de ce mini-site d'exercice.
</section>

<!-- QUESTION 1 -->
<section id="question1" class="exercice">
    <h2 class="exercice-ttl">Question 1</h2>
    <p class="exercice-txt">Créez un tableau listant toutes les pages du site et contenant toutes les données qui leurs sont associées.</p>
    <p class="exercice-txt">Afficher l'intégralité du tableau sur la page.</p>
    <div class="exercice-sandbox">
        <?php
        $pages = [
            ['title' => 'Accueil', 'url' => 'index.php'],
            ['title' => 'Donnez moi des fruits', 'url' => 'exo2.php'],
            ['title' => 'Donnez moi de la thune', 'url' => 'exo3.php'],
            ['title' => 'Donnez moi des fonctions', 'url' => 'exo4.php'],
            ['title' => 'Netflix', 'url' => 'exo5.php'],
            ['title' => 'Mini-site', 'url' => 'exo6.php']
        ];
        var_dump($pages);
        ?>
    </div>
</section>

<!-- QUESTION 2 -->
<section id="question2" class="exercice">
    <h2 class="exercice-ttl">Question 2</h2>
    <p class="exercice-txt">Implémenter une fonction qui génére le code HTML du menu de navigation du site.</p>
    <p class="exercice-txt">Utiliser cette fonction pour afficher le menu sur l'ensemble des pages du site.</p>
    <div class="exercice-sandbox">
        <?php
        // function createMenu($pages, $currentPage)
        // {
        //     $menu = '<ul class="main-nav-list">';
        //     foreach ($pages as $page) {
        //         $title = $page['title'];
        //         $url = $page['url'];
        //         $activeClass = ($currentPage === $url) ? 'active' : '';
        //         $menu .= '<li><a href="' . $url . '" class="main-nav-link ' . $activeClass . '">' . $title . '</a></li>';
        //     }
        //     $menu .= '</ul>';
        //     return $menu;
        // }
        ?>
    </div>
</section>

<!-- QUESTION 3 -->
<section id="question3" class="exercice">
    <h2 class="exercice-ttl">Question 3</h2>
    <p class="exercice-txt">Placez tout le code en commun en entête de toutes les pages dans un fichier spécifique.</p>
    <p class="exercice-txt">Utiliser ce fichier pour afficher l'entête de chaque page.</p>
    <div class="exercice-sandbox">

    </div>
</section>

<!-- QUESTION 4 -->
<section id="question4" class="exercice">
    <h2 class="exercice-ttl">Question 4</h2>
    <p class="exercice-txt">Effectuez la même opération que la question précédente pour le footer des pages.</p>
    <div class="exercice-sandbox">
        <?php
        require 'footer.php';
        ?>
    </div>
</section>
</div>
<?php
require 'footer.php';
?>
</body>

</html>