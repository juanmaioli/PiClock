/*!
  * PiClock v0.0.1 (https://juanmaioli.com.ar/)
  * Copyright 2019-2020 Juan Maioli Author (https://github.com/juanmaioli/PiClock)
  * Licensed under MIT 
  */

function run_Clock(){
    actual_Time = new Date()
    hour = actual_Time.getHours()
    minute = actual_Time.getMinutes()
    second = actual_Time.getSeconds()
    
    str_hour = "0"+ new String (hour)
    str_hour = str_hour.slice(-2); 

    str_minute = "0"+ new String (minute)
    str_minute = str_minute.slice(-2);
    
    str_second = "0"+ new String (second)
    str_second = str_second.slice(-2);
    document.getElementById("divClock").innerHTML = str_hour + ":" + str_minute + ":" + str_second;
    setTimeout("run_Clock()",1000)
}
