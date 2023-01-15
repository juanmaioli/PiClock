<?php
// Dolar FAF $dolar_valor = round(ceil($dolar_valor)+1,-1);
include("config.php");
include("functions.php");

//Date to work
  $dateShow = new DateTime(date("Y-m-d"));
  $dateShow = $dateShow->format('Y-m-d');
  $dateShow  = strtotime($dateShow);
  $longdate = strftime("%d de %B de %Y",  $dateShow );
  $longdate = fecha_ES($longdate);


//OpenWeatherMap
  $html = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=". $weather_city ."&units=" . $weather_units . "&lang=" . $weather_lang . "&appid=". $weather_apikey);
  $json = json_decode($html);

  $city_name = $json->name;
  $temp = $json->main->temp;
  $temp = round($temp,1);
  $temp .= " " . $weather_temp_symbol;
  $pressure = $json->main->pressure;
  $humidity = $json->main->humidity;
  $feels_like = $json->main->feels_like;
  $feels_like = round($feels_like,1);
  $feels_like .= " " . $weather_temp_symbol;
  $wind_speed = $json->wind->speed;
  $wind_speed = round(($wind_speed *60*60)/1000);
  $wind_dir = wind_cardinals($json->wind->deg);
  $clouds = $json->clouds->all;
  $weather_main= $json->weather[0]->main;
  $weather_desc = $json->weather[0]->description;
  $weather_desc = ucwords(strtolower($weather_desc));
  $icon = $json->weather[0]->icon.".png";
  $icon = weather_Icon($icon);
  $visibility = $json->visibility / 1000;
  $lon = $json->coord->lon;
  $lat = $json->coord->lat;

//Dolar
  $formatARS = new NumberFormatter('es_AR',  NumberFormatter::CURRENCY);

  $html = file_get_contents("https://www.dolarsi.com/api/api.php?type=valoresprincipales");
  $json = json_decode($html);
  $valor_titulo = $json[0]->casa->nombre; // Access Object data
  $valor_venta = $json[0]->casa->venta; // Access Object data
  $valor_venta = str_replace(",",".", $valor_venta);
  $valor_venta = floatval($valor_venta);
  $valor_venta_input = floatval($valor_venta);
  $valor_venta = $formatARS->formatCurrency($valor_venta , 'ARS');

  $valor_compra = $json[0]->casa->compra; // Access Object data
  $valor_compra = str_replace(",",".", $valor_compra);
  $valor_compra = floatval($valor_compra);
  $valor_compra = $formatARS->formatCurrency($valor_compra , 'ARS');

  $valor_titulo_b = $json[1]->casa->nombre; // Access Object data
  $valor_venta_b = $json[1]->casa->venta; // Access Object data
  $valor_venta_b = str_replace(",",".", $valor_venta_b);
  $valor_venta_b = floatval($valor_venta_b);
  $valor_venta_b = $formatARS->formatCurrency($valor_venta_b , 'ARS');

  $valor_compra_b = $json[1]->casa->compra; // Access Object data
  $valor_compra_b = str_replace(",",".", $valor_compra_b);
  $valor_compra_b = floatval($valor_compra_b);
  $valor_compra_b = $formatARS->formatCurrency($valor_compra_b , 'ARS');
  $sunset = date_sunset(time(), SUNFUNCS_RET_STRING, $lat, $lon, 90.5, -3);
  $sunrise = date_sunrise(time(), SUNFUNCS_RET_STRING, $lat, $lon, 90.5, -3);

//Astro
  $str_sunset = strtotime($sunset);
  $str_sunset = date("H:i", $str_sunset);
  $str_sunrise = strtotime($sunrise);
  $str_sunrise = date("H:i",$str_sunrise);
  $start_Time = new DateTime($str_sunset);
  $end_Time = new DateTime($str_sunrise);

  $interval = $start_Time->diff($end_Time);
  $sunlight = $interval->format('%H hs %i mins');

  $start_Time = $start_Time->format('G');
  $start_Time = intval($start_Time);

  $end_Time = $end_Time->format('G');
  $end_Time = intval($end_Time);

  $now_Time = intval(date('G'));

  $claseSegunHora = "dayColor";
  if($now_Time <= $end_Time || $now_Time >= $start_Time){
    $claseSegunHora = "nigthColor";
  } else{$claseSegunHora = "dayColor";}

  $timestamp = time();
  $moon = moon_phase(date('Y', $timestamp), date('n', $timestamp), date('j', $timestamp));

?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv='Refresh' content='<?=$autorefresh?>; URL=index.php'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Juan Maioli">
    <meta name="author" content="https://juanmaioli.com.ar">
    <title>PiClock</title>
    <link rel="apple-touch-icon" sizes="57x57" href="./img/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./img/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./img/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./img/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./img/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./img/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./img/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./img/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./img/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="./img/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./img/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon-16x16.png">
    <link rel="manifest" href="./img/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="./img/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css?version=4.5.0">
    <!-- fontawesome.com -->
    <link rel="stylesheet" href="css/all.min.css?version=5.13.1">
    <!-- Pi Clock styles -->
    <link rel="stylesheet" href="css/piclock.css?version=0.5.0" >
    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- leafletjs.com CSS-->
    <link rel="stylesheet" href="css/leaflet.css?version=1.6.0"/>
    <!-- leafletjs.com JS-->
    <script src="js/leaflet.js?version=1.6.0"></script>
    <!-- Jquery for Bootstrap -->
    <script src="js/jquery-3.5.1.min.js?version=3.5.1"></script>
  </head>
  <body class="fixed-nav <?=$claseSegunHora?>" id="page-top">
    <div class="container-fluid h-100">
      <div id="demo" class="carousel slide" data-ride="carousel" data-interval="<?=$time_slide?>">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="card-body">
                <div class="row">
                  <div class="col text-center">
                  <h1 class="display-3" ><i class="fal fa-clock text-primary"></i>&nbsp;<span id="divClock"></span></h1>
                  <h6><?=$longdate?></h6>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-center">
                  <h1 class="display-3" ><?=$icon?>&nbsp;<?=$temp?></h1>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-center">
                  <h3><?=$weather_desc?></h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item text-center p-1">
              <div class="card rounded <?=$claseSegunHora?>">
                <div class="card-header"><h5>El Clima en <?=$city_name?></h5></div>
                <div class="card-body">
                  <div class="row">
                    <div class="col text-left"></div>
                  </div>
                  <div class="row">
                    <div class="col text-left"><h3><i class="fal fa-cloud text-info fa-fw"></i>&nbsp;Sensación Térmica&nbsp;<?=$feels_like?></h3></div>
                  </div>
                  <div class="row">
                    <div class="col text-left"><h3><i class="fal fa-humidity fa-fw text-primary fa-fw"></i>&nbsp;Humedad:&nbsp;<?=$humidity?>%</h3></div>
                  </div>
                  <div class="row">
                    <div class="col text-left"><h3><i class="fal fa-wind fa-fw text-info fa-fw"></i>&nbsp;Viento <?=$wind_dir?>&nbsp;a&nbsp;<?=$wind_speed?> km/h</h3></div>
                  </div>
                  <div class="row">
                    <div class="col text-left"><h3><i class="fal fa-tachometer-alt-fast text-info fa-fw"></i>&nbsp;Presi&oacute;n&nbsp;<?=$pressure?>kPa</h3></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item  text-center p-1">
            <div class="card rounded <?=$claseSegunHora?>">
                <div class="card-header"><h5>El Clima en <?=$city_name?></h5></div>
                <div class="card-body">
                  <div class="row">
                    <div class="col text-left"><h3><i class="fal fa-low-vision text-info fa-fw"></i>&nbsp;Visibilidad&nbsp;<?=$visibility?>km</h3></div>
                  </div>
                  <div class="row">
                    <div class="col text-left"><h3><i class="fal fa-cloud text-info fa-fw"></i>&nbsp;Nubosidad&nbsp;<?=$clouds?>%</h3></div>
                  </div>
                  <div class="row">
                      <div class="col text-left"><h3>
                      <i class="fal fa-sunrise text-warning fa-fw"></i>&nbsp;<?=$sunrise?>&nbsp;
                      <i class="fal fa-sunset text-warning fa-fw"></i>&nbsp;<?=$sunset?></h3>
                      <h3><i class="fas fa-sun text-warning fa-fw"></i>&nbsp;<?=$sunlight?></h3></div>
                  </div>
                  <div class="row">
                      <div class="col text-left"><h3><i class="fal fa-moon text-primary fa-fw"></i>&nbsp;<?=$moon;?></h3></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
            <div class="card rounded <?=$claseSegunHora?>">
                <div class="card-header"><h5>Cotización Dolarsi.com</h5></div>
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                    <h1 class="text-left" ><i class="fal fa-money-bill-wave text-success"></i> <?=$valor_compra?> / <?=$valor_venta?></h1>
                    <h1 class="text-left" ><i class="fal fa-money-bill-wave text-primary"></i> <?=$valor_compra_b?> / <?=$valor_venta_b?></h1>
                    </div>
                  </div>
              </div>
            </div>
          <!-- Left and right controls -->
          <!-- <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a> -->
          </div>
        </div>
  </div>
    <!-- Popper for Bootstrap -->
    <script src="js/popper.min.js?version=2.4.4" ></script>
    <!-- Bootstrap JS-->
    <script src="js/bootstrap.min.js?version=4.5.0"></script>
    <!-- Pi Clock JS -->
    <script src="js/piclock.js?version=0.0.1"></script>
    <script>
      run_Clock('<?=$timeZone?>');
    </script>
  </body>
</html>