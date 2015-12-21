<?php

namespace ProxyScraper;

use Curl\Curl;

class GoogleProxyNetScraper implements ProxyScraperRegex{

    private $url = 'http://www.google-proxy.net/';

    public function fetchRegex()
    {
        $curl = new Curl();

        $curl->get($this->url);

        if($curl->error){
            echo 'Error: ' . $curl->error_code;
        }
        else{
            $response = $curl->response;

            preg_match_all(
                "/([\d+\.]+)<\/td><td>(\d+)<\/td><td>[\w\s]+<\/td><td>[\w\s]+<\/td><td>([\w\s]+)<\/td>/",
                $response,
                $proxies,
                PREG_SET_ORDER
            );

            foreach($proxies as $key => $proxy){

            }
        }
    }

}