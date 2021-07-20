<?php

function copyright_str($start_year) {
//    $current_year = date("y");
    $current_year = new DateTime();
    $current_year = $current_year->format("y");
    return "&copy; $start_year&ndash;$current_year";
}
echo copyright_str(2010) . "<br>";
echo "<quote>" . date('d M Y ♦ H:i:s') . "</quote>";