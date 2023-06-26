<?php
require '_functions.php'
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/exo5.css">
    <title>Introduction PHP - <?= $title; ?></title>
</head>

<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Introduction PHP - <?= $title; ?></h1>
            <nav class="main-nav">
                <?php
                $pages = [
                    ['title' => 'Accueil', 'url' => 'index.php'],
                    ['title' => 'Donnez moi des fruits', 'url' => 'exo2.php'],
                    ['title' => 'Donnez moi de la thune', 'url' => 'exo3.php'],
                    ['title' => 'Donnez moi des fonctions', 'url' => 'exo4.php'],
                    ['title' => 'Netflix', 'url' => 'exo5.php'],
                    ['title' => 'Mini-site', 'url' => 'exo6.php'],
                    ['title' => 'test page', 'url' => '#']
                ];

                echo createMenu($pages, basename($_SERVER['PHP_SELF']));
                ?>
            </nav>
        </header>