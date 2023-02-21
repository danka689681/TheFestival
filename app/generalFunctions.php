
<?php
function generateContent($navbar, $body){ 

    $htmlString = 
                '<!DOCTYPE html><html lang="en">' .
                file_get_contents("./templateHead.php") .
                '<body>' .
                file_get_contents($navbar) .
                file_get_contents($body) .
                file_get_contents("./templateScripts.php") .
                '</body></html>' ;
               
    file_put_contents("./generatedOutput.php", $htmlString); 
}