<?php

session_start();
$con=new mysqli("localhost","root","","client_database");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
if(isset($_POST['addnot'])){
    $head=$_POST['heading'];
    $updt=$_POST['update'];

    date_default_timezone_set("Asia/Calcutta");
    $date = date("Y-m-d");
    $time = date("h:i:sa");

    $query_notif = "insert into updates(heading, content, date, time) values ('$head','$updt','$date','$time');";

    // $result=mysqli_query($con,$query_notif);
    

    if (mysqli_query($con, $query_notif)) {
        header("location:admin_base_panel.php");
    }
    else {
        echo "Error: " . $query_notif . "<br>" . mysqli_error($conn);
    }
}
?>