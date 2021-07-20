<?php
    $list = [ 1, 4, "WTF", "lol", 17, 'o.o' ];
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    for ($i = 0; $i < count($list); $i++) :
        echo "<h1>Item $i : $list[$i]</h1>";
    endfor;
    ?>
    <?php
    foreach ($list as $item) :
        echo "<h1>$item</h1>";
    endforeach;
    ?>
</body>
</html>
