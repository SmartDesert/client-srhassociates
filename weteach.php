<?php

require_once('PHPMailer/PHPMailerAutoload.php');
session_start();
$con=new mysqli("localhost","root","","client_database");
if(isset($_POST['entry_submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $content=$_POST['content'];

    $message = $name."\r\n".$email."\r\n".$contact."\r\n".$content."\r\n";

    $query="insert into weteach(name,email,contact,content) values ('$name','$email','$contact','$content');";
    date_default_timezone_set("Asia/Calcutta");
    $date = date("Y-m-d");
    $time = date("h:i:sa");
    $query_admin = "insert into admin(date, time, name, contact, email, query, details, replied) values ('$date','$time','$name','$contact','$email', 'We Teach', '$content', 'False');";
    $result_admin=mysqli_query($con,$query);

    $result=mysqli_query($con,$query_admin);

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
}
?>