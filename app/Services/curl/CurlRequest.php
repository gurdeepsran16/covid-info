<?php

namespace App\Services\curl;

class CurlRequest {
	
	private $api_base;
	
	public function __construct($base_endpoint) {
		$this->api_base = $base_endpoint;
	}
	
	public function get($endpoint) {

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => $this->api_base.''.$endpoint,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return json_decode($response);
	}
}