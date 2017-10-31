<?php 

namespace app\Models;

use Cache;
use App\Models\WheaterInterface;

class OpenWeatherProvider implements WheaterInterface
{
    private $data;
    public $temperature;
    public $clouds;
    
    public function __construct()
    {
        $this->temperature = $this->setTemperature();
        $this->clouds = $this->getWeatherInfo()->clouds->all;
    }
    
    /**
     * return json decoded object from openweathermap
     */ 
    public function getWeatherInfo($asArray = false)
    {
        $api_call = 'api.openweathermap.org/data/2.5/weather?id=593116&units=metric&APPID=c861d2ae805be486bbc25f04cb9508b3';
    
    
        if (Cache::has('openWheater')) {
            $result = Cache::get('openWheater');
        } else {
            $curl = curl_init();
    
            curl_setopt($curl, CURLOPT_URL, $api_call);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
            $result = curl_exec($curl);
            Cache::put('openWheater', $result, 5);
        }
        
        $encode_result = json_decode($result, $asArray);
        $this->data = $encode_result;
        
        return $encode_result;
    }
    
    public function setTemperature()
    {
        $data = (array)$this->getWeatherInfo(true);
        
        if ($data['cod'] != 200) {
            return isset($data['message']) ? $data['message'] : null;
        }
        
        if (isset($data['main']['temp'])) {
            return $data['main']['temp'];
        }
        
        return null;
    }
    
    public function getLink()
    {
        return 'http://openweathermap.org/';
    }
    
    public function getData($key = null) 
    {
        if ($key) {
            return isset($this->data[$key]) ? $this->data[$key] : null;
        }
        
        return $this->data;
    }
    
    public function getTemperature()
    {
        return $this->temperature;
    }
    
}