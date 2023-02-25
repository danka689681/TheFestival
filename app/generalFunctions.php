
<?php
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

function sendMail(){ 

    $to = "repkova2001@gmail.com";
    $subject = "My subject";
    $txt = "Hello world!";
    $headers = "From: webmaster@example.com";
    $msg = "First line of text\nSecond line of text";

        // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);

        // send email
    mail($to, "My subject",$msg);
}
