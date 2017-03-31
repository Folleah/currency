<?php

namespace Folleah\Currency\ApiServices;

trait ApiQueryBuilder
{

    /**
     * Make http query by cURL
     * @param String $url - URI
     * @param Array $params - http params
     * @return Array - query result
     */
    public static function httpQueryJSON($url, $params)
    {
        $body = http_build_query($params);
        $url = $url."?".$body;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);

        return json_decode($data, true);
    }
}
