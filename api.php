<?php

    $authorization = "Authorization: BEARER {eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2MjgzNTAzOTQsInR5cGUiOiJleHRlcm5hbCIsInVzZXIiOiJqdWFubWFpb2xpQGdtYWlsLmNvbSJ9.8d0wYbwI4Z7J2Lw0MdOD0sDFTh1GT2O3LaVz78kjE9PwRikzyf0NPhr-F7XqKsxU7wpdHPqBU-zCT0H95NRLOg}";

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',$authorization));
    curl_setopt($ch, CURLOPT_URL, "http://api.estadisticasbcra.com/usd_of/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    curl_close($ch); 

    print_r($res);