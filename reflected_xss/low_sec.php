<?php
// file to modify: /var/www/html/dvwa/vulnerabilities/xss_r/source/low.php

header ("X-XSS-Protection: 0");

// Is there any input?
if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) {
    // We wrap the user input with htmlspecialchars() to prevent XSS.
    // This function converts special characters like '<' and '>' into their
    // safe HTML entity equivalents (&lt; and &gt;).
    $html .= '<pre>Hello ' . htmlspecialchars( $_GET[ 'name' ] ) . '</pre>';
}

?>
