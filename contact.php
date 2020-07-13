<?php

require_once('PHPMailer/PHPMailerAutoload.php');
$db_connect=mysqli_connect("localhost","root","","client_database") or die();
if (mysqli_connect_error())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$contact=$_REQUEST['contact'];
$content=$_REQUEST['content'];
/*
 * Inserting data to table
 * */
$message = $name."\r\n".$email."\r\n".$contact."\r\n".$content."\r\n";

$date = date("Y-m-d");
$time = date("h:i:sa");
$query_admin = "insert into admin(date, time, name, contact, email, query, details, replied) values ('$date','$time','$name','$contact','$email', 'We Teach', '$content', 'False');";
$result=mysqli_query($db_connect,$query_admin);

$query=mysqli_query($db_connect,"insert into contact_us (name, email, contact, content) VALUES ('$name','$email','$contact','$content')") or die(mysqli_error($db_connect));

$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'senders email';
$mail->Password = 'senders password';
$mail->SetFrom('no-reply@srhassociates.com');
$mail->Subject = 'We Teach';
$mail->Body = $message;
$mail->AddAddress('pragathiravikumarbr@gmail.com');

if(!$mail->send()) {
    	header("string");
	}
	else {
		header("location:home.html");
	}

?>