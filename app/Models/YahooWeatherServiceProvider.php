<?php

namespace app\Models;

class YahooWeatherServiceProvider{
    public $temp;
    
    public function __construct(){
        $this->temp = $this->getWet()->query->results->channel->item->condition->temp;
    }
        public function getWet(){
            $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
            $yql_query = 'select * from weather.forecast where woeid=55848083 and u="c"';
            $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&u=c&format=json";
           
            $session = curl_init($yql_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
           
            $phpObj = json_decode($json);
            return $phpObj;
        }
    
}


class OpenWeatherProvider{
    public $temperature;
    public $clouds;
    
    public function __construct(){
        $this->temperature = $this->getWeatherInfo()->main->temp;
        $this->clouds = $this->getWeatherInfo()->clouds->all;
    }
    
    /**
     * return json decoded object from openweathermap
     */ 
    public function getWeatherInfo(){
        $api_call = 'api.openweathermap.org/data/2.5/weather?id=593116&units=metric&APPID=c861d2ae805be486bbc25f04cb9508b3';
    
        $curl = curl_init();
    
        curl_setopt($curl, CURLOPT_URL, $api_call);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
        $result = curl_exec($curl);
            
        $encode_result = json_decode($result);
        return $encode_result;
    }
    
}

?>