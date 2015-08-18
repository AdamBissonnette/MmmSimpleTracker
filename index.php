<?php

include_once("bootstrap.php");

$log = TrackUser($entityManager);

var_dump(json_encode($log));


?>