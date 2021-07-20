<style>
    body { font-size: 3em; font-family: "Bookman Old Style"; }
</style>
<?php
$con = new mysqli("localhost", "root");
if ($con->connect_error)
    exit("failed to connect to mysql<br>" . $con->connect_error);
if (!$con->query("CREATE DATABASE _HEY_HEY_"))
    echo "failed to create database<br>";
$con->select_db("_HEY_HEY_");
$query = <<< SQL
CREATE TABLE someone (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);
SQL;
if (!$con->query($query))
    echo "failed to create table : {$con->error}<br>";
$query = <<< SQL
INSERT INTO someone VALUES (null, "new_fname", "new_lname", "", CURRENT_DATE);
SQL;
if (!$con->query($query))
    echo "failed to insert data row : {$con->error}<br>";
else
    echo "#" . $con->insert_id . " inserted<br>";
$con->close();

//===============================================================
$con = mysqli_connect("localhost", "root");
if (mysqli_connect_error())
    exit("failed to connect to mysql<br>" . mysqli_connect_error());
if (mysqli_query($con, "CREATE DATABASE _HEY_HEY_"))
    echo "failed to create database<br>";
mysqli_select_db($con, "_HEY_HEY_");
$query = <<< SQL
CREATE TABLE something (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);
SQL;
if (!mysqli_query($con, $query))
    echo "failed to create table : {$con->error}<br>";
$query = <<< SQL
INSERT INTO something VALUES (null, "new_fname", "new_lname", "", CURRENT_DATE);
SQL;
if (!mysqli_query($con, $query))
    echo "failed to insert data row : {$con->error}<br>";
else
    echo "#" . mysqli_insert_id($con) . " inserted<br>";
mysqli_close($con);
//===============================================================
echo "• PDO:<br>";
try {
    $con = new PDO("mysql:host=localhost;", "root");
    if ($con->exec("CREATE DATABASE _HEY_HEY_") === false)
        echo "failed to create database<br>";
    if ($con->exec("USE _HEY_HEY_") === false)
        echo "failed to use database<br>";
    $query = <<< SQL
    CREATE TABLE xxx (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP
    );
SQL;
    if ($con->exec($query) === false)
        echo "failed to create table<br>";
    $query =
<<< SQL
  INSERT INTO xxx VALUES (null, "xxxxxx", "xxxxx", "hhhhhhhhhh", CURRENT_DATE);
SQL;
    if ($con->exec($query) === false)
        echo "failed to insert data row<br>";
    else {
        echo "#" . $con->lastInsertId() . " inserted<br>";
    }
} catch (Exception $x) {
    echo "failed to connect to mysql<br>" . $x->getMessage();
} finally {
    $con = null;
}