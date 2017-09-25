 
<?php
require("connection.php");
require 'PHPMailerAutoload.php'; 
$query="SELECT  `password`,  FROM `users` WHERE `scrname`='tgupt'";
if(($result=$conn->query($query))==TRUE)
$password=$result->fetch_assoc();
 
$mail = new PHPMailer();
 
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'vatsal.14pro@gmail.com';                   // SMTP username
$mail->Password = 'passavas';               // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('vatsal.14pro@gmail.com', '');     //Set who the message is to be sent from
$mail->addReplyTo('vatsal.14pro@gmail.com', '');  //Set an alternative reply-to address
$mail->addAddress('vatsal.14pro@gmail.com', '');  // Add a recipient
$mail->addAddress('');               // Name is optional
//$mail->addCC('');
//$mail->addBCC('');
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('localhost/phpsandbox/reset.php');         // Add attachments
//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
 
$mail->Subject = 'this works';
$mail->Body    = 'it works! <b>yeah!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
 
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
 
echo 'Message has been sent';
 header("Location:reset.php");
 ?>