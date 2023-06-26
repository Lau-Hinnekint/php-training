<?php

/**
 * Return every value from array in HTML list.
 *
 * @param array $array input array
 * @param string $ulClass The CSS class to add to the UL element
 * @param string $liClass The CSS class to add to LI elements
 * @return string HTML list
 */
function getListFromArray(array $array, string $ulClass = '', string $liClass = ''): string
{
    if ($ulClass !== '') $ulClass = ' class="' . $ulClass . '"';
    if ($liClass !== '') $liClass = ' class="' . $liClass . '"';

    $a = array_map(fn ($v) => "<li$liClass>$v</li>", $array);
    return '<ul' . $ulClass . '>' . implode('', $a) . '</ul>';
}

/**
 * Return every value from array
 *
 * @param array $serie input array
 * @return string 
 */
function getHTMLFromSerie(array $serie): string
{
    $html = '<a class="serie" href="exo5.php?id=' . $serie["id"] . '#exo4">';
    $html .= '<h3 class="serie-ttl">' . $serie["name"] . '</h3>';
    $html .= '<img src="' . $serie["image"] . '" alt="' . $serie["name"] . '">';
    $html .= '</a>';
    return $html;
}

/**
 * generate nav bar
 *
 * @param array $pages input arrays
 * @param string $currentPage
 * @return string return navigation menu
 */
function createMenu(array $pages, string $currentPage): string
{
    $menu = '<ul class="main-nav-list">';
    foreach ($pages as $page) {
        $title = $page['title'];
        $url = $page['url'];
        $activeClass = ($currentPage === $url) ? 'active' : '';
        $menu .= '<li><a href="' . $url . '" class="main-nav-link ' . $activeClass . '">' . $title . '</a></li>';
    }
    $menu .= '</ul>';
    return $menu;
}
