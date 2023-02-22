
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