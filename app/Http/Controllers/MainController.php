<?php

namespace App\Http\Controllers;

use App\Models\WeatherService;

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
}