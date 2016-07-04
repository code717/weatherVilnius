<?php

namespace app\Models;

use App\Models\YahooWeatherServiceProvider;

class WeatherService{
    
    public function __construct(){
        $this->yahoo = new YahooWeatherServiceProvider();
        $this->open_weather = new OpenWeatherProvider();
    }
    
    public function displayYahooWeather(){
        return $this->yahoo->temp;
    }
    
    public function displayOpenWeather(){
        return $this->open_weather->temperature;
    }
}



?>