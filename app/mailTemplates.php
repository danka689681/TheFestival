<?php
function resetPasswordMailTemplate($recepientName, $urlToEmail) {
    $htmlString = 
    '<div>Hello ' . $recepientName  .',</div>' .
    '<p>Click on <a href="'.$urlToEmail.'">this</a> link to reset your password.</p>' .
    '<p>Best wishes,</p>' .
    '<p>Musiva team</p>';
    return $htmlString;
}
function confirmEmailTemplate($recepientName, $urlToEmail) {
    $htmlString = 
    '<div>Hello ' . $recepientName  .',</div>' .
    '<p>Click on <a href="'.$urlToEmail.'">this</a> link to confirm your email.</p>' .
    '<p>Best wishes,</p>' .
    '<p>Musiva team</p>';
    return $htmlString;
}