<?php
$to = 'localhost.vatsal.14pro@gmail.com';
$subject = 'Dari localhost wamp server';
$message = 'it works!';
$headers = 'From: vatsal.14pro@gmail.com' . "\r\n" .
'MIME-Version: 1.0' . "\r\n" .
'Content-type: text/html; charset=utf-8';
if(mail($to, $subject, $message, $headers))
echo "email sent";
else
echo "failed";

?>