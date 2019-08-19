<?php
require('connectdb.php');
// Include and initialize phpmailer class
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8'; 

// SMTP configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'devhelp.no.reply@gmail.com';
$mail->Password = 'Sashelpsupport2017';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom($_POST['email'], $_POST['name']);
$mail->addReplyTo($_POST['email'], $_POST['name']);

// Add a recipient
$mail->addAddress('devhelp.contact@gmail.com');

// Email subject
$mail->Subject = $_POST['subject']." - ". $_POST['name'];

// Set email format to HTML
$mail->isHTML(true);

// Email body content
$mailContent = "<p style = 'font-size:17px;'>".$_POST['message']."</p>";
$mail->Body = $mailContent;

// Send email
if($mail->send())
{
    header('Location:accueil.php');
}
else
{
    header('Location:contact.php');
}


$name=$_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message=$_POST['message'];

$query = "INSERT INTO `contact` (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

$result = mysqli_query($connection, $query);
?>
