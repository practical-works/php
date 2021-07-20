<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Challenge: using loops</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Multiplication Table</h1>
<table>
    <?php
        for($i=0; $i<13; $i++) {
            echo "<tr>";
            if ($i == 0) {
                for ($j=0; $j<13; $j++) {
                    if ($i == 0 && $j == 0) {
                        echo "<th>&nbsp;</th>";
                    } else {
                        echo "<th>$j</th>";
                    }
                }
            } else {
                for ($j=0; $j<13; $j++) {
                    if ($j == 0) {
                        echo "<th>$i</th>";
                    } else {
                        echo "<td>" . $i * $j . "</td>";
                    }
                }
            }
            echo "</tr>";
        }
    ?>
</table>
</body>
</html>