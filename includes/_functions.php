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
