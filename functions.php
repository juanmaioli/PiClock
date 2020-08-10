<?php
function wind_cardinals($deg) {
	$cardinal=0;
	$cardinalDirections = array(
		'N' => array(348.75, 360),
		'N' => array(0, 11.25),
		'NNE' => array(11.25, 33.75),
		'NE' => array(33.75, 56.25),
		'ENE' => array(56.25, 78.75),
		'E' => array(78.75, 101.25),
		'ESE' => array(101.25, 123.75),
		'SE' => array(123.75, 146.25),
		'SSE' => array(146.25, 168.75),
		'S' => array(168.75, 191.25),
		'SSO' => array(191.25, 213.75),
		'SO' => array(213.75, 236.25),
		'OSO' => array(236.25, 258.75),
		'O' => array(258.75, 281.25),
		'ONO' => array(281.25, 303.75),
		'NO' => array(303.75, 326.25),
		'NNO' => array(326.25, 348.75)
	);
	foreach ($cardinalDirections as $dir => $angles) {

			if ($deg >= $angles[0] && $deg < $angles[1]) {
				$cardinal = $dir;
			}
		}
		return $cardinal;
}

function weather_Icon($w_icon){
    switch ($w_icon) {
        case "01d.png": 
            $Icon_Show = "<i class='far fa-sun text-warning fa-fw' alt='Soleado'></i>";
            break;
            case "01n.png": 
            $Icon_Show = "<i class='far fa-moon text-info fa-fw'></i>";
            break;
            case "02d.png": 
            $Icon_Show = "<i class='far fa-cloud-sun text-warning fa-fw'></i>";
            break;
            case "02n.png": 
            $Icon_Show = "<i class='far fa-cloud-moon text-info fa-fw'></i>";
            break;
            case "03d.png": 
            $Icon_Show = "<i class='far fa-cloud text-info fa-fw'></i>";
            break;
            case "03n.png": 
            $Icon_Show = "<i class='far fa-cloud text-info fa-fw'></i>";
            break;
            case "04d.png": 
            $Icon_Show = "<i class='far fa-cloud text-info fa-fw'></i>";
            break;
            case "04n.png": 
            $Icon_Show = "<i class='far fa-cloud text-info fa-fw'></i>";
            break;
            case "09d.png": 
            $Icon_Show = "<i class='far fa-cloud-rain text-info fa-fw'></i>";
            break;
            case "09n.png": 
            $Icon_Show = "<i class='far fa-cloud-rain text-info fa-fw'></i>";
            break;
            case "10d.png": 
            $Icon_Show = "<i class='far fa-cloud-sun-rain text-info fa-fw'></i>";
            break;
            case "10n.png": 
            $Icon_Show = "<i class='far fa-cloud-moon-rain text-info fa-fw'></i>";
            break;
            case "11d.png": 
            $Icon_Show = "<i class='far fa-bolt text-warning fa-fw'></i>";
            break;
            case "11n.png": 
            $Icon_Show = "<i class='far fa-bolt text-warning fa-fw'></i>";
            break;
            case "13d.png": 
            $Icon_Show = "<i class='far fa-snowflake text-primary fa-fw'></i>";
            break;
            case "13n.png": 
            $Icon_Show = "<i class='far fa-snowflake text-primary fa-fw'></i>";
            break;
            case "50d.png": 
            $Icon_Show = "<i class='far fa-smog text-white fa-fw'></i>";
            break;
            default : 
            $Icon_Show = "<i class='far fa-thermometer-half text-danger fa-fw'></i>";
    }
	return $Icon_Show;
}
function fecha_ES($fechalarga){
	$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
	$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	$fechalarga = str_replace($meses_EN, $meses_ES, $fechalarga);
	$fechalarga = str_replace($dias_EN, $dias_ES, $fechalarga);
	return $fechalarga;
}


function moon_phase($year, $month, $day)

{
	$c = $e = $jd = $b = 0;
	if ($month < 3)
	{
		$year--;
		$month += 12;
	}
	++$month;

	$c = 365.25 * $year;
	$e = 30.6 * $month;
	$jd = $c + $e + $day - 694039.09;	//jd is total days elapsed
	$jd /= 29.5305882;					//divide by the moon cycle
	$b = (int) $jd;						//int(jd) -> b, take integer part of jd
	$jd -= $b;							//subtract integer part to leave fractional part of original jd
	$b = round($jd * 8);				//scale fraction from 0-8 and round
	if ($b >= 8 )
	{
		$b = 0;//0 and 8 are the same so turn 8 into 0
	}
	switch ($b)
	{
		case 0:
			return 'Luna Nueva';
			break;
		case 1:
			return 'Luna Creciente';
			break;
		case 2:
			return 'Cuarto Creciente';
			break;
		case 3:
			return 'Luna Gibosa Creciente';
			break;
		case 4:
			return 'Luna Llena';
			break;
		case 5:
			return 'Luna Gibosa Menguante';
			break;
		case 6:
			return 'Cuarto Menguante';
			break;
		case 7:
			return 'Luna Creciente';
			break;
		default:
			return 'Error';
	}
}

?>