<?php

/**
 * Print an array as an html table.
 * @param $array
 * the array to print
 */
function print_array($array) {
    echo
    "<table class='datatable'>
            <tr>
                <th class='key'>Key</th>
                <th class='value'>Value</th>
            </tr>";

    foreach ($array as $key => $value) {
        echo "<tr><td class='key'>$key</td><td class='value'>$value</td></tr>";
    }

    echo "</table>";
}