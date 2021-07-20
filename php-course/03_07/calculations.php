<?php
$total_min = 318;
$hrs = (int)($total_min / 60);
$min = $total_min % 60;
echo "$total_min min contains $hrs hours and $min minutes.";
