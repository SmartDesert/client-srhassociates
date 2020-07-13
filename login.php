<?php
session_start();
$con=new mysqli("localhost","root","","client_database");
if(isset($_POST['login_submit'])){
	$username=$_POST['email'];
	$password=$_POST['password'];
	$query="select * from login where username='$username' and password='$password';";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		$_SESSION['username']=$username;
		header("Location:admin_base_panel.php");
	}
	else
		echo "enter valid details";
}
?>