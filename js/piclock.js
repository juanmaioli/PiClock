/*!
  * PiClock v0.0.2 (https://juanmaioli.com.ar/)
  * Copyright 2019-2022 Juan Maioli Author (https://github.com/juanmaioli/PiClock)
  * Licensed under MIT
  */


function run_Clock(timeZone){
  const options = {
    timeZone: timeZone,
    hour12: false,
    hour: "2-digit",
    minute: "2-digit",
    second: "2-digit"
  };

  const actualTime = new Date()
  const timeToShow = actualTime.toLocaleTimeString([], options)
  document.getElementById("divClock").innerHTML = timeToShow
  setTimeout("run_Clock()", 1000)
}
