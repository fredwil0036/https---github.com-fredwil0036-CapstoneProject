<?php

namespace App\Services;

use GuzzleHttp\Client;

class OpenWeatherService
{
    protected $client;
    protected $apiKey='8be40765ce9c3ce5f09e4cddb6f2b3aa';

    public function __construct()
    {
        $this->client = new Client();
        
    }

    public function getWeather($city)
    {
        $response = $this->client->get("http://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$this->apiKey}&units=metric");

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), true);
        }

        return null;
    }
    public function getWeatherForecast($city)
    {
        $city = urlencode($city); // URL-encode the city name
        $response = $this->client->get("http://api.openweathermap.org/data/2.5/forecast?q={$city}&appid={$this->apiKey}&units=metric");

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), true);
        }

        return null;
    }
}
