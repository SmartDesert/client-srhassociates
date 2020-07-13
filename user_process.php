<?php

require './dbconnect.php';
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$contact=$_REQUEST['contact'];
$description=$_REQUEST['description'];
/*
 * Inserting data to table
 * */

$query=mysqli_query($db_connect,"INSERT INTO contact_us (name, email, contact, content) VALUES ('$name','$email','$contact','$description')") or die(mysqli_error($db_connect));

mysqli_close($db_connect);
header("location:home.html");
?>
 