<?php


/**
 * Return every value from array in HTML list.
 *
 * @param array $array input array
 * @return string HTML list
 */
function getListFromArray(array $array): string
{
    $a = array_map(fn ($v) => "<li>$v</li>", $array);
    return '<ul>' . implode('', $a) . '</ul>';
}
