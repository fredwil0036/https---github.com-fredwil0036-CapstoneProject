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
        $city = $request->input('city', 'Urdaneta,Pangasinan, Philippines'); // Default to Sta Barbara, Philippines
        $currentWeather = $this->weatherService->getWeather($city);
        $forecast = $this->weatherService->getWeatherForecast($city);

        // Ensure the weather and forecast variables are not null
        if (!$currentWeather || !$forecast) {
            return response()->json(['error' => 'Unable to fetch weather data'], 500);
        }

        //1 week weather
        $filteredForecast = [];
        $forecastCount = 0;
        $Hourlyforecast = array_slice($forecast['list'], 0, 8);

        foreach ($forecast['list'] as $forecastItem) {
            $date = substr($forecastItem['dt_txt'], 0, 10); // Extract date part
            if (!isset($filteredForecast[$date]) && $forecastCount < 6) {
                $filteredForecast[$date] = $forecastItem;
                $forecastCount++;
            }
        }

        return view('admin.adminpages.weatherShow', compact('currentWeather', 'filteredForecast','Hourlyforecast'));
    }
    

    
}
