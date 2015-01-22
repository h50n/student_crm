<?php

require_once 'libs/PHPMailer/PHPMailerAutoload.php';


// $m = new PHPmailer;

// $m->isSMTP();
// $m->SMTPAuth = true;
// $m->SMTPDebug = 2;

// $m->Host = 'smtp.gmail.com';
// $m->Username = '';
// $m->Password = '';
// $m->SMTPSecure = 'tls';
// $m->Port = 587;


// $m->From = 'chrisa@fluentfocus.com';
// $m->FromName = 'Chris Hanson';
// $m->addReplyTo('reply@phpacademy.org','Reply address');
// $m->addAddress('chrishanson88@gmail.com', 'Chris Hanson');

// $m->Subject = 'Here is an email';
// $m->Body = 'This is the body of an email!';
// $m->AltBody = 'This is the body of an email!';

// var_dump($m->send());

$mail             = new PHPMailer();

//$body             = file_get_contents('contents.html');
//$body             = eregi_replace("[\]",'',$body);
$body 				= "This is the body";

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "yourusername@gmail.com";  // GMAIL username
$mail->Password   = "yourpassword";            // GMAIL password

$mail->SetFrom('name@yourdomain.com', 'First Last');

$mail->AddReplyTo("name@yourdomain.com","First Last");

$mail->Subject    = "PHPMailer Test Subject via smtp (Gmail), basic";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "whoto@otherdomain.com";
$mail->AddAddress($address, "John Doe");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}
    


?>