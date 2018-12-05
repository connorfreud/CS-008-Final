<?php
$phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");

$path_parts = pathinfo($phpSelf);

 ?>	
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Patriots Place</title>
        <meta charset="utf-8">
        <meta name="author" content="Connor Freud and Sara Clark">
        <meta name="description" content="cs008 Final Project">
        
        <link rel="stylesheet" href="finalcss.css" type="text/css" media="screen">
    </head>

<?php
print '<body id="' . $path_parts['filename'] . '">' . PHP_EOL;

include ('pats_header.php');
print PHP_EOL;

include ('pats_nav.php');
print PHP_EOL;



$domain = '//';     
        
   $server = htmlentities($_SERVER['SERVER_NAME'], ENT_QUOTES, 'UTF-8');     
        
   $domain .= $server;     
        
    if($debug) {
        print '<p> Self: ' . $phpSelf;
        print '<p>domain: ' . $domain;
        print '<p>Path Parts<pre>';
        print_r($path_parts);
        print '</pre></p>';
    }

require_once 'lib/security.php';

include_once 'lib/validation-function.php';

include_once 'lib/mail-message.php';


?>
