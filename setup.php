<?php

/*********time zone************/
date_default_timezone_set('America/Bogota');


/***********url return *************/
$returnUrl = 'http://localhost/Evertecphp/requestsession.php';

$login='2d9eaf1e662518756a3d78806543af5b';

$nonce = random_bytes(16);

$seed = date('c');
$expiration = strtotime ( '+20 minute' , strtotime ($seed) ) ; 
$expiration = date ( 'c', $expiration); 

$secretkey='3YC5brb5eAR4xBGQ';


?>    