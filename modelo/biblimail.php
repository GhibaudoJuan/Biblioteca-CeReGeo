<?php

?>






<?php 

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */
/*
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();


$mail->isSMTP();


$mail->SMTPDebug = SMTP::DEBUG_SERVER;


$mail->Host = 'smtp.live.com';

$mail->Port = 465;


$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;


$mail->SMTPAuth = true;


$mail->Username = '';


$mail->Password = '';


$mail->setFrom('');

$mail->addAddress('');
$mail->isHTML(true);
//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';

$mail->Body= 'holiss';



if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';

}




/*
if(isset($_POST)){
    
    $to = "ghibaudjuan@gmail.com";
    $subject = "Asunto del email";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    $message = "
<html>
<head>
<title>HTML</title>
</head>
<body>
<h1>Esto es un H1</h1>
<p>Esto es un párrafo en HTML</p>
</body>
</html>";
    
   $mail= mail($to, $subject, $message, $headers);
    if ($mail)
        echo "enviado";
        else
            echo "no enviado";
    
    
    $email="";
    $asunto="prueva";
    $mensaje="holiss";
    $header= "From: noreply@example.com"."\r\n";
    $header.="Reply-To: noreply2example.com"."\r\n";
    $header.="X-Mailer: PHP/". phpversion();
    
    $mail= mail($email,$asunto,$mensaje,$header);
    if ($mail)
        echo "enviado";
        else
            echo "no enviado";
    
    
    mail("","asunto","mensaje");
}
    

*/

?>
<!doctype html>
<html>
<head>
</head>
<body>
<form action="biblimail.php" method="POST">
     <input type="text" name="name">
     <input type="email" name="email" value="noreply@example.com">
     <button type="submit">Send</button>
</form>
</body>


</html>



<?php 


$to = "ghibaudjuan@gmail.com";
$subject = "Asunto del email";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$message = "
<html>
<head>
<title>HTML</title>
</head>
<body>
<h1>Esto es un H1</h1>
<p>Esto es un párrafo en HTML</p>
</body>
</html>";

$mail=mail($to, $subject, $message, $headers);

if ($mail)
    echo "enviado1";
    else
        echo "no enviado1";

$email="ghibaudjuan@gmail.com";
$asunto="prueva";
$mensaje="holiss";
$header= "From: noreply@example.com"."\r\n";
$header.="Reply-To: noreply2example.com"."\r\n";
$header.="X-Mailer: PHP/". phpversion();

$mail= mail($email,$asunto,$mensaje,$header);
if ($mail)
echo "enviado2";
else
echo "no enviado2";

?>
