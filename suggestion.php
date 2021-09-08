<?php








require 'PHPMailer/src/Exception.php';

require 'PHPMailer/src/SMTP.php';
require_once "PHPMailer/src/PHPMailer.php";
$mail = new PHPMailer(true);
$mail->SMTPDebug = 3;                               
$mail->isSMTP();                                     
$mail->Host = 'ftp.vjit.ac.in';
$mail->SMTPAuth = true;                               
$mail->Username = 'munazzarmutant783@gmail.com'; 
$mail->Password = "foodballerandrider";                           
$mail->SMTPSecure = "ssl";                           
$mail->Port = 465;                                   
$mail->From = "munazzarmutant783@gmail.com";
$mail->FromName = "Full Name";
$mail->addAddress("mdmunazzar@gmail.com", "Recepient Name");
$mail->isHTML(true);
$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";
if(!$mail->send()) 
{
echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
echo "Message has been sent successfully";
}

?>