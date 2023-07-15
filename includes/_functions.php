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
    if ($ulClass !== '') $ulClass = ' class="'.$ulClass.'"';
    if ($liClass !== '') $liClass = ' class="'.$liClass.'"';
    
    $a = array_map(fn ($v) => "<li$liClass>$v</li>", $array);
    return '<ul'.$ulClass.'>' . implode('', $a) . '</ul>';
}

/**
 * Undocumented function
 *
 * @param array $serie
 * @return string
 */
function getHtmlFromSerie(array $serie) :string {
    $html = '<a href="?serie='.$serie['id'].'#question4"><h3>'.$serie['name'].'</h3>';
    $html .= '<img class="serie-img" src="'.$serie['image'].'" alt=""></a>';
    return $html;
}


function getSerieFromId(int $id) :array|null {
    global $series;
    $serieIdMatch = array_filter($series, fn($serie) => $serie['id'] == $id);
    sort($serieIdMatch);
    if (!empty($serieIdMatch)) {
        return $serieIdMatch[0];
    }
    return null;
}


function getNavigation(array $pages): string
{
    $links = array_map(function ($page) {
        $active = $page['link'] == basename($_SERVER['PHP_SELF']) ? ' active' : '';
        return '<a href="' . $page['link'] . '" class="main-nav-link' . $active . '">' . $page['title'] . '</a>';
    }, $pages);

    return '<nav class="main-nav">' . getListFromArray($links, 'main-nav-list') . '</nav>';
}


function getNavigation2(array $pages): string
{
    $html = '<nav class="main-nav"><ul class="main-nav-list">';
    foreach ($pages as $page) {
        $active = $page['link'] == basename($_SERVER['PHP_SELF']) ? ' active' : '';
        $html .= '<li><a href="' . $page['link'] . '" class="main-nav-link' . $active . '">' . $page['title'] . '</a></li>';
    }
    $html .= '</ul></nav>';
    return $html;
}

function getCurrentPageTitle(array $pages) :string  {
    foreach ($pages as $page) {
        if ($page['link'] == basename($_SERVER['PHP_SELF'])) {
            return $page['name'];
        }
    }
    return '';
}