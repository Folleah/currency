<?php

namespace Folleah\Currency\ApiServices;

class ApiServiceBuilder
{
    /**
     * Make http query by cURL
     * @param $url String - URI
     * @param $params Array - http params
     * @return Array - query result
     */
    public function httpQuery($url, $params)
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
