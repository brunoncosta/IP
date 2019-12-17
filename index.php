<?php

require "bootstrap.php";

$ip = ( new IP( $configs ) )
->set()
->data()
->get();

header('Content-type: application/json');
echo json_encode($ip);

?>
