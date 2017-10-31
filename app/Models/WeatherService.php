<?php

namespace app\Models;

use App\Models\YahooWeatherServiceProvider;
use App\Models\OpenWeatherProvider;

class WeatherService{
    protected $provider;
    
    /*public function __construct(){
        $this->yahoo = new YahooWeatherServiceProvider();
        $this->open_weather = new OpenWeatherProvider();
    }
    
    public function displayYahooWeather(){
        return $this->yahoo->temp;
    }
    
    public function displayOpenWeather(){
        return $this->open_weather->temperature;
    }*/
    
    public function setProvider(WheaterInterface $provider)
    {
        $this->provider = $provider;
    }
    
    public function getProvider()
    {
        return $this->provider;
    }
    
    public function getTemperature()
    {
        return $this->provider->getTemperature();
    }
    
    public function getLink()
    {
        return $this->provider->getLink();
    }
}


?>