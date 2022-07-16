<?php

include "../koneksi.php";
$url = "https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/DigitalForecast-JawaBarat.xml";
header("Content-Type: application/json");

$urlConfig = [
  "appid" => "cf97d0fc6ccf83c3e667fb24244657df",
  "lat" => -6.323298,
  "lon" => 107.306339,
  "dt" => date_timestamp_get(date_create()), 
  "lang" => "id",
  "units" => "metric"
];

$config = weather($urlConfig);

echo getURL($config);