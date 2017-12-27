<?php
$server="localhost";
$log="root";
$pass="";
$DBname="usanox";
$connection = mysqli_connect($server, $log, $pass,$DBname);
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'usanox');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
?>