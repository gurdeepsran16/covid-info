<?php

namespace App\Services;

use App\Services\curl\CurlRequest;

class GetCovidInfo {

    private $all_countries_api_service;
    private $all_countries_api_base_url;
    private $india_covid_info_api;
    private $india_covid_info_api_base_url;

    public function __construct()
    {
        $this->all_countries_api_base_url = 'https://corona.lmao.ninja/v2/';
        $this->all_countries_api_service = new CurlRequest($this->all_countries_api_base_url);
        $this->india_covid_info_api_base_url = 'https://api.rootnet.in/covid19-in/';
        $this->india_covid_info_api = new CurlRequest($this->india_covid_info_api_base_url);
    }
	
	public function casesInAllCountries() 
    {
        try {
            return $this->all_countries_api_service->get('countries?yesterday=false&sort=');
        } catch (\Exception $e) {
            echo "Something Went Wrong please again after some time"; // Here we can pass this dyanmic message to end user
        }
	}

    public function getCasesInfoIndia()
    {
        try {
            return $this->india_covid_info_api->get('stats/latest');
        } catch (\Exception $e) {
            echo "Something Went Wrong please again after some time"; // Here we can pass this dyanmic message to end user
        }
    }
}