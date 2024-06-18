<?php
$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DBNAME = "File";

$connection = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DBNAME);
if(!$connection){
    die("Unable to connect to database");
}

?>