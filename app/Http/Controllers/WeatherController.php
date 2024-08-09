<?php

namespace App\Http\Controllers;

use App\Services\OpenWeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $weatherService;
    

    public function __construct(OpenWeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function show(Request $request)
    {
        $city = $request->input('city', 'Santa Barbara,Pangasinan, Philippines');
        $currentWeather = $this->weatherService->getWeather($city);
        $forecast = $this->weatherService->getWeatherForecast($city);
    
        if (!$currentWeather || !$forecast) {
            return response()->json(['error' => 'Unable to fetch weather data'], 500);
        }
    
        $filteredForecast = [];
        $forecastCount = 0;
        $Hourlyforecast = array_slice($forecast['list'], 0, 8);
    
        foreach ($forecast['list'] as $forecastItem) {
            $date = substr($forecastItem['dt_txt'], 0, 10);
            if (!isset($filteredForecast[$date]) && $forecastCount < 6) {
                $filteredForecast[$date] = $forecastItem;
                $forecastCount++;
            }
        }
    
        if ($request->ajax()) {
            return response()->json([
                'currentWeather' => $currentWeather,
                'filteredForecast' => $filteredForecast,
                'Hourlyforecast' => $Hourlyforecast
            ]);
        }
    
        return view('admin.adminpages.weatherShow', compact('currentWeather', 'filteredForecast', 'Hourlyforecast'));
    }
    

    
}
