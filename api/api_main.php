<?php 
header("Content-Type: application/json");

include "../koneksi.php";

// GET Data JSON from URL
// $response = get_web_page("localhost/iot/api/api_volt.php");
// echo $response;

//GET JSON to Array
$resArr = getJSON("http://192.168.0.177");
// print_r($resArr);

// function get_web_page($url) {
//     $options = array(
//         CURLOPT_RETURNTRANSFER => true,   // return web page
//         CURLOPT_HEADER         => false,  // don't return headers
//         CURLOPT_FOLLOWLOCATION => true,   // follow redirects
//         CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
//         CURLOPT_ENCODING       => "",     // handle compressed
//         CURLOPT_USERAGENT      => "test", // name of client
//         CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
//         CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
//         CURLOPT_TIMEOUT        => 120,    // time-out on response
//     ); 

//     $ch = curl_init($url);
//     curl_setopt_array($ch, $options);

//     $content  = curl_exec($ch);

//     curl_close($ch);

//     return $content;
// }

//Access JSON Obejct 
// $dataObj = json_decode($response);
// echo $dataObj->label[0];

// echo getURL($url);
// $jsonResponse = getURL($url);

// foreach ($jsonResponse->label as $key => $value) {
//   echo $key . " - " .$value;
// }

$volt = floatval($resArr->volt);
$ampere = floatval($resArr->ampere);
$power = floatval($resArr->power);
$energy = floatval($resArr->energy);
$frequency = floatval($resArr->freq);
$pf = floatval($resArr->pf);
$date = "\"" .date("Y-m") . "-15 " .date("H:i:s"). "\"";

// $volt = floatval(rand(220, 240));
// $ampere = floatval(rand(0, 15));
// $power = floatval(rand(10, 50));
// $energy = floatval(0);
// $frequency = floatval(rand(50, 60));
// $pf = floatval(0);

$status = 0;

$sql = "INSERT INTO loging (volt, ampere, watt, energy, freq, pf, onupdate) VALUES (${volt}, ${ampere}, ${power}, ${energy}, ${frequency}, ${pf}, now())";
$exec = $conn->query($sql);
if($exec == TRUE) {
  $status = 1;
}
else {
  echo "Error: " . $conn->error;
  $status = 0;
}

$data = [
  "volt" => $volt,
  "ampere" => $ampere,
  "power" => $power,
  "energy" => $energy, 
  "freq" => $frequency,
  "pf" => $pf,
  "status" => $status
];
set_time_limit(5);
echo json_encode($data);
