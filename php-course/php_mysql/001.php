<?php
function write_message($message, $text_color) {
    echo "<div style='color:$text_color; font-family:Consolas; font-size:2.3em;'>• $message</div>";
}

//================================================================
// ♦ MySQLi OOP
//================================================================
// Open connection
$mysqli_oop_connection = new mysqli("localhost", "root");
// Check connection
if ($mysqli_oop_connection->connect_error) {
    write_message("MySQLi OOP Connection Error : Failed to connect.<br>" . $mysqli_oop_connection->connect_error, "red");
} else {
    write_message("MySQLi OOP Connection OK : Successfully connected.", "green");
}
// Close connection
$mysqli_oop_connection->close();

//================================================================
// ♦ MySQLi Procedural
//================================================================
// Open connection
$mysqli_proc_connection = mysqli_connect("localhost", "root");
// Check connection
if (!$mysqli_proc_connection) {
    write_message("MySQLi Procedural Connection Error : Failed to connect.<br>" . mysqli_connect_error(), "red");
} else {
    write_message("MySQLi Procedural Connection OK : Successfully connected.", "green");
}
// Close connection
mysqli_close($mysqli_proc_connection);

//================================================================
// ♦ PDO
//================================================================
try {
    // Open connection
    $pdo_connection = new PDO("mysql:host=localhost;dbname=school", "root");
    // Set Error handling mode to Exception mode
    $pdo_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    write_message("PDO Connection OK : Successfully connected.","green");
} catch(Exception $x) {
    write_message("PDO Connection Error : Failed to connect.<br>Exception: " . ucfirst($x->getMessage()), "red");
}
// Close connection
$pdo_connection = null;
