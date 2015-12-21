<?php

require 'vendor/autoload.php';

$s = new \ProxyScraper\GoogleProxyNetScraper();

try{
    $proxies = $s->fetch();
}
catch(FailedToRetrieveProxiesException $ex){
    die('Failed to retrieve proxies');
}

var_dump($proxies);