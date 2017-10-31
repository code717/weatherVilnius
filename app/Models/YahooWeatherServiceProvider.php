<?php

namespace app\Models;

use Cache;
use App\Models\WheaterInterface;

class YahooWeatherServiceProvider implements WheaterInterface
{
    private $data;
    public $temp;
    
    public function __construct()
    {
        $this->temp = $this->getWet()->query->results->channel->item->condition->temp;
    }
       
    public function getWet(){
        $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
        $yql_query = 'select * from weather.forecast where woeid=55848083 and u="c"';
        $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&u=c&format=json";
           
        if (Cache::has('yahooWeather')) {
            $json = Cache::get('yahooWeather');
        } else {
            $session = curl_init($yql_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
            Cache::put('yahooWeather', $json, 5); 
        }
            
        $phpObj = json_decode($json);
        $this->data = $phpObj;
        
        return $phpObj;
    }
        
    public function getLink()
    {
        return 'https://www.yahoo.com/news/weather';
    }
    
    public function getTemperature()
    {
        return $this->temp;
    }
    
    public function getData($key = null)
    {
        $data = (array)$this->data;
        
        if ($key) {
            return isset($data[$key]) ? $data[$key] : null;
        }
        
        return $data;
    }
    
}

?>