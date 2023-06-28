<?php

namespace Yanglei9999\Weather;

use GuzzleHttp\Client;

class Weather
{
    protected $key;
    protected $guzzleOptions = [];

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function getHttpClient()
    {
        return new Client($this->guzzleOptions);
    }

    public function setGuzzleOptions(array $options)
    {
        $this->guzzleOptions = $options;
    }

    public function getWeather(string $city, string $type = 'base', string $format = 'json')
    {

        $url = 'https://restapi.amap.com/v3/weather/weatherInfo';

        $query = array_filter([
            'key'   => $this->key,
            'city'  => $city,
            'output'    => $format,
            'extensions'    => $type,
        ]);

        try {
            $response = $this->getHttpClient()->get($url, [
                'query' => $query,
            ])->getBody()->getContents();

            return $format === 'json' ? json_decode($response, true) : $response;
        } catch (\Exception $e) {
            return '请求失败，' . $e->getMessage();
        }
    }

}