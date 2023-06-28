<h1 align="center"> weather </h1>

<p align="center"> 天气预报.</p>


## Installing

```shell
$ composer require yanglei9999/weather -vvv
```

## Usage

```php
$response = $weather->getWeather('深圳', 'all');
```
config/services.php
```angular2html
 'weather' => [
        'key' => env('WEATHER_API_KEY'),
    ],
```

.env
```angular2html
WEATHER_API_KEY=xxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```
## Contributing


## License

MIT