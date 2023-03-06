<?php
use PHPMailer\PHPMailer\PHPMailer;
require "vendor/autoload.php";

function getHostingURL() {
    return "localhost/";
}

function generateContent($header, $body, $footer){ 
    $htmlString = 
                '<!DOCTYPE html><html lang="en">' .
                file_get_contents("./templateHead.php") .
                '<body>' .
                file_get_contents($header) .
                file_get_contents($body) .
                file_get_contents($footer) .
                file_get_contents("./templateScripts.php") .
                '</body></html>';
    return $htmlString; 
}

function sendMail($subject, $htmlString, $bodyPlainText, $recepientMail, $recepientName) {
    echo "Sending mail to " . $recepientMail . " with subject " . $subject . " and body " . $htmlString;
    $mail = new PHPMailer;
    //Enable SMTP debugging.
    $mail->SMTPDebug = 0;                           
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();        
    //Set SMTP host name                      
    $mail->Host = "smtp.gmail.com";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                      
    //Provide username and password
    $mail->Username = "musivagroup@gmail.com";             
    $mail->Password = "zunigrbhzjxbhsss";                       
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";                       
    //Set TCP port to connect to
    $mail->Port = 587;                    
    $mail->From = "musivagroup@musiva.com";
    $mail->FromName = "Musiva";
    $mail->addAddress($recepientMail, $recepientName);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $htmlString;
    $mail->AltBody = $bodyPlainText;
    if($mail->send())
    {return true;}
}

?>