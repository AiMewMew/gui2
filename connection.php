<?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "gui";
//$username = getenv('CLOUDSQL_USER');
$password = getenv('CLOUDSQL_PASSWORD');
$dbname = getenv('CLOUDSQL_DB');

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
?>
