<?php

require './dbconnect.php';
$email=$_REQUEST['email'];
$cpass=$_REQUEST['password'];
/*
 * Inserting data to table
 * */

$query=mysqli_query($db_connect,"INSERT INTO login (username, password) VALUES ('$email','$cpass')") or die(mysqli_error($db_connect));

mysqli_close($db_connect);
header("location:home.html");
?>
 