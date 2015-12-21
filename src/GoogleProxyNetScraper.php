<?php

namespace ProxyScraper;

use Curl\Curl;
use ProxyScraper\Interfaces\ProxyScraperRegex;

class GoogleProxyNetScraper implements ProxyScraperRegex{

    private $url = 'http://www.google-proxy.net/';

    public function fetch()
    {
        $curl = new Curl();

        $curl->get($this->url);

        $proxies = [];

        if($curl->error){
            echo 'Error: ' . $curl->error_code;
        }
        else{
            $response = $curl->response;

            preg_match_all(
                "/([\d+\.]+)<\/td><td>(\d+)<\/td><td>[\w\s]+<\/td><td>[\w\s]+<\/td><td>([\w\s]+)<\/td>/",
                $response,
                $proxiesArray,
                PREG_SET_ORDER
            );

            foreach($proxiesArray as $key => $proxyIter){
                $proxies[] = new Proxy($proxyIter[1], $proxyIter[2], str_replace(' proxy', '', $proxyIter[3]));
            }
        }

        return $proxies;
    }

}