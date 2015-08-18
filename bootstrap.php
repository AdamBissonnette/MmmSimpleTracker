<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);

// database configuration parameters
$conn = array(
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

function TrackUser($em)
{
    // var_dump($data);
    $log = new TrackingLog();

    $clientIP = "";
    $forwardedIP = "";
    $remoteIP = "";
    $browserData = "";
    $code = "";

    $log->setDate(new DateTime());

    if (isset($_REQUEST["code"]))
    {
        $code = $_REQUEST["code"];
    }

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $clientIP = $_SERVER['HTTP_CLIENT_IP'];
    } 

    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $forwardedIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    if (!empty($_SERVER['REMOTE_ADDR'])) {
        $remoteIP = $_SERVER['REMOTE_ADDR'];
    }

    if (!empty($_SERVER['HTTP_USER_AGENT'])) {
        $browserData = $_SERVER['HTTP_USER_AGENT'];
    }

    $log->setClientIP($clientIP);
    $log->setForwardedIP($forwardedIP);
    $log->setRemoteIP($remoteIP);
    $log->setBrowserData($browserData);
    $log->setCode($code);

    $em->persist($log);
    $em->flush();
    return $log;
}

function MakePrettyException(Exception $e) {
$trace = $e->getTrace();

$result = 'Exception: "';
$result .= $e->getMessage();
$result .= '" @ ';
if($trace[0]['class'] != '') {
  $result .= $trace[0]['class'];
  $result .= '->';
}
$result .= $trace[0]['function'];
$result .= '();<br />';

return $result;
}