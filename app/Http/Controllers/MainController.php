<?php

namespace App\Http\Controllers;

use App\Models\WeatherService;
use App\Models\WeatherServiceFactory;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MainController extends Controller{
    
    public function getWeather(){
        $service = new WeatherService;
        
        $temp = $service->displayYahooWeather();
        return view('welcome')->with('temp', $temp)->with('title','OpenWeatherMap')->with('link', 'http://openweathermap.org/');
    }
    
    public function getYahoo(){
        $serv = new WeatherService();
        
        $temp = $serv->displayOpenWeather();
        return view('welcome')->with('temp', $temp)->with('title','Yahoo ')->with('link', 'https://www.yahoo.com/news/weather');
        
    }
    
    public function getTemperature($provider)
    {
        $weatherService = WeatherServiceFactory::create($provider);
        
        if ($weatherService) {
           $temp = $weatherService->getTemperature();
           $link = $weatherService->getLink(); 
        } else {
            throw new NotFoundHttpException('defined weather provider not found');
        }
        
        return view('welcome')->with('temp', $temp)->with('title', $provider)->with('link', $link);
    }
}