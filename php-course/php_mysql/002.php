<style>
    body { font-size: 3em; font-family: "Bookman Old Style"; }
</style>
<?php
$host = "localhost";
$username = "root";

$connection = new mysqli($host, $username);
if ($connection->connect_error) {
    exit($connection->connect_error);
}
echo "• connected to mysql using mysqli object-oriented api<br>";
if ($connection->query("create database ___mysqli_obj")) {
    echo "♦ '___mysqli_obj' database created<br>";
} else if ($connection->query("drop database ___mysqli_obj")) {
    echo "♦ '___mysqli_obj' database dropped<br>";
}
$connection->close();
echo "• disconnected<br>";

$connection = mysqli_connect($host, $username);
if (mysqli_connect_error()) {
    exit(mysqli_connect_error());
}
echo "• connected to mysql using mysqli procedural api<br>";
if (mysqli_query($connection, "create database ___mysqli_proc")) {
    echo "♦ '___mysqli_proc' database created<br>";
} else if (mysqli_query($connection, "drop database ___mysqli_proc")) {
    echo "♦ '___mysqli_proc' database dropped<br>";
}
$connection->close();
echo "• disconnected<br>";

try {
    $dsn = "mysql: host=$host;";
    $connection = new PDO($dsn, $username);
    echo "• connected to mysql using pdo api<br>";
    if ($connection->exec("create database ___pdo")) {
        echo "♦ database ___pdo created<br>";
    } else if ($connection->exec("drop database ___pdo") !== false) {
        echo "♦ '___pdo' database dropped<br>";
    }
} catch (Exception $x) {
    echo "{$x->getMessage()}<br>";
} finally {
    $connection = null;
    echo "disconnected<br>";
}



