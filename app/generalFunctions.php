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

function createUser($email, $name, $password, $confirmPassword) {
    require_once __DIR__ . '/mailTemplates.php';
    require_once __DIR__ . '/DAL/UserService.php';
    require_once __DIR__ . '/Model/User.php';
    require_once __DIR__ . '/DAL/TokenService.php';
    require_once __DIR__ . '/Model/Token.php';
    $UserService = new UserService();
    $TokenService = new TokenService();

    $secretAPIkey = "6LffltEkAAAAAPBfKt38wQyyXLJmuioLBelpHlHw";
    $subject = "Musiva - Confirm email";
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $urlToEmail = 'localhost/login' . 'validation/validateemail?'.http_build_query([
        'selector' => $selector,
        'validator' => bin2hex($token)
    ]);
                if ($password == $confirmPassword) {
                    $user = $UserService->getUserByEmail($email);
                    if ($user == null) {
                        $timezone = new DateTimeZone("Europe/Prague");
                        $expires = new DateTime();
                        $expires->setTimezone(new DateTimeZone("Europe/Prague"));
                        $expires->add(new DateInterval('P3M')); // + 3 months
                        $password == "" ? null : password_hash($password, PASSWORD_DEFAULT);
                        $UserService->createUser($name, $email, $password);
                        echo '<script>alert("User created!")</script>';
                        if ($TokenService->tokenExists($email)) {
                            $TokenService->updateTokenByUserEmail($email, hash('sha256', $token), $selector, $expires);
                        } else {
                            $TokenService->createToken($email, $selector, hash('sha256', $token), $expires, 0);
                         }
                        $htmlString = confirmEmailTemplate($name, $urlToEmail);
                        $mailSent = sendMail($subject, $htmlString, $bodyPlainText=$htmlString, $email, $name);
                        if ($mailSent) {
                            echo '<script>alert("Mail sent")</script>';
                            return true;
                        } else {
                            echo '<script>alert("Sending mail failed")</script>';
                            return false;
                        }
                    } else {
                        echo '<script>alert("User already exists!")</script>';
                        return false;
                    }
                } else {
                    echo '<script>alert("Passwords do not match!")</script>';
                    return false;
                }
}

function protectedRoute($route){
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        echo '<script type="text/javascript">
            window.location = /' . $route . '
        </script>';
    } else {
        echo '<script type="text/javascript">
            window.location = "/login"
        </script>';
    }
} 

    function createArtistObject($stmt) {
        $artists = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $Image = new Image();
            $Image->setID($row["ForeignKeyID"]);
            $Image->setName($row["ImageName"]);
            $Image->setType($row["Type"]);
            $Image->setIsLogo($row["IsLogo"]);
            $Image->setData($row["Data"]);
            $artists[$row["ID"]]["ID"] = $row["ID"];
            $artists[$row["ID"]]["Name"] = $row["Name"];
            $artists[$row["ID"]]["Description"] = $row["Description"];
            $artists[$row["ID"]]["YouTube"] = $row["YouTube"];
            $artists[$row["ID"]]["Spotify"] = $row["Spotify"];
            $artists[$row["ID"]]["DemoSong"] = $row["DemoSong"];
            if ($row["IsLogo"] == 1) {
                $artists[$row["ID"]]["Logo"] = $Image;
            } else {
                $artists[$row["ID"]]["Images"][] = $Image;
            }
        }
        $artistsObj = [];
        foreach ($artists as $artist) {
            $Artist = new Artist();
            $Artist->setId($artist["ID"]);
            $Artist->setName($artist["Name"]);
            $Artist->setDescription($artist["Description"]);
            $Artist->setYouTube($artist["YouTube"]);
            $Artist->setSpotify($artist["Spotify"]);
            $Artist->setDemoSong($artist["DemoSong"]);
            if (array_key_exists("Logo", $artist)) {
                $Artist->setLogo($artist["Logo"]);
            }
            if (array_key_exists("Images", $artist)) {
                $Artist->setImages($artist["Images"]);
            }
            $artistsObj[] = $Artist;
        }
        return $artistsObj;
 
    }

?>