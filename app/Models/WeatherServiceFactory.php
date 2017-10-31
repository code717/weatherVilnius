<?php

namespace app\Models;

use App\Models\YahooWeatherServiceProvider;
use App\Models\OpenWeatherProvider;
use App\Models\WeatherService;

class WeatherServiceFactory
{
    static function create($type) 
    {
        $weatherService = new WeatherService();
        $service = null;
        switch ($type) {
            case 'yahoo':
                $service = new YahooWeatherServiceProvider();
            break;
            case 'openWeather':
                $service = new OpenWeatherProvider();
            break;
        }
        $weatherService->setProvider($service);
        return $weatherService;
    }
}