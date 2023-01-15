# PiClock

### Mini web desarrollada en PHP para poder usar una Rasperry Pi con pantalla de  3,5"(480x320) como reloj.

#### Muestra en pantalla:
- Reloj
- Temperatura Actual(openweathermap.org).
- Sensación Térmica(openweathermap.org).
- Humedad(openweathermap.org).
- Dirección del viento y velocidad(openweathermap.org).
- Presión atmosférica(openweathermap.org).
- Visibilidad(openweathermap.org).
- Nubosidad(openweathermap.org).
- Horario de amanecer y atardecer(openweathermap.org).
- Horas de luz diurna(openweathermap.org).
- Fases lunares(openweathermap.org).
- Cotización dólar (Dolarsi.com).

#### Configuracion:
Renombrar config_example.php a config.php

#### Variables de config.php

-	$autorefresh = 600; // Web autorefresh in Seconds
-	$time_slide = 13000;//Miliseconds
-	$timeZone = "America/Argentina/Buenos_Aires";// Timezone by https://en.wikipedia.org/wiki/List_of_tz_database_time_zones
-	$weather_apikey ="API_KEY";//https://openweathermap.org/api
-	$weather_city ="CITY"; //City by https://openweathermap.org/find
-	$weather_lang = "es";
-	$weather_temp_symbol = "°C";// °C or °F
-	$weather_units = "metric";//Default: Kelvin, Metric: Celsius, Imperial: Fahrenheit https://openweathermap.org/current
