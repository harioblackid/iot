<?php
//Set Timezone to Asian
date_default_timezone_set('Asia/Jakarta');
$limitCurrent = 1;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iotapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (isset($_SESSION['user'])) {
  header("index.php?login=fail");
}

function weather($arr){
  $url = "api.openweathermap.org/data/2.5/weather?";
  
  $index = 1;

  foreach ($arr as $key => $value) {
    
    if($index == count($arr)){
      $url .= $key."=".$value;
    } else {
      $url .= $key."=".$value."&";
    }
    $index++;
  } 
  
  return $url;
}

function get_month($month) {
  switch ($month) {
      case 1: return "Januari";
      case 2: return "Februari";
      case 3: return "Maret";
      case 4: return "April";
      case 5: return "Mei";
      case 6: return "Juni";
      case 7: return "Juli";
      case 8: return "Agustus";
      case 9: return "September";
      case 10: return "Oktober";
      case 11: return "November";
      case 12: return "Desember";
  }
}

function date_indo($fulldate) {
  $date = substr($fulldate, 8, 2);
  $month = get_month(substr($fulldate, 5, 2));
  $year = substr($fulldate, 0, 4);
  return get_time($fulldate). " - " .$date . ' ' . $month . ' ' . $year;
}

function get_time($fulldate)
{
  $date   = date_create($fulldate);
  $hour   = date_format($date, 'H');
  $minute = date_format($date, 'i');
  $second = date_format($date, 's');
  
  return $hour . ":" . $minute . ":". $second;
}

function getTimeBetween($fulldate){
  $date   = date_create($fulldate);
  $hour   = date_format($date, 'H');
  $minute = date_format($date, 'i');
  $second = date_format($date, 's');

  $start = date_format($date, 'Y-m-d'). " " .date_format($date, 'H:i'). ":" ."00";
  $end = date_format($date, 'Y-m-d'). " " .date_format($date, 'H:i'). ":" ."59";

  return "BETWEEN \"". $start . "\" AND \"" . $end ."\"";

}

function runReport($between){
  $string = "SELECT TIME_FORMAT(onupdate, '%H:%i') as time, 
  min(volt) as voltMin, max(volt) as voltMax,
  min(ampere) as ampereMin, max(ampere) as ampereMax,
  min(watt) as powerMin, max(watt) as powerMax,
  min(freq) as freqMin, max(freq) as freqMax 
  FROM loging 
  WHERE onupdate ";


  $last = " ORDER BY onupdate DESC LIMIT 0,10";

  return $string . $between . $last;
}

function getJSON($url) {
  $options = array(
      CURLOPT_RETURNTRANSFER => true,   // return web page
      CURLOPT_HEADER         => false,  // don't return headers
      CURLOPT_FOLLOWLOCATION => true,   // follow redirects
      CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
      CURLOPT_ENCODING       => "",     // handle compressed
      CURLOPT_USERAGENT      => "test", // name of client
      CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
      CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
      CURLOPT_TIMEOUT        => 120,    // time-out on response
  ); 

  $ch = curl_init($url);
  curl_setopt_array($ch, $options);

  $content  = curl_exec($ch);

  curl_close($ch);

  return json_decode($content);
}

function getURL($url) {
  $options = array(
      CURLOPT_RETURNTRANSFER => true,   // return web page
      CURLOPT_HEADER         => false,  // don't return headers
      CURLOPT_FOLLOWLOCATION => true,   // follow redirects
      CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
      CURLOPT_ENCODING       => "",     // handle compressed
      CURLOPT_USERAGENT      => "test", // name of client
      CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
      CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
      CURLOPT_TIMEOUT        => 120,    // time-out on response
  ); 

  $ch = curl_init($url);
  curl_setopt_array($ch, $options);

  $content  = curl_exec($ch);

  curl_close($ch);
  return $content;
}

function countSambaran($conn) {
  $exec = $conn->query("SELECT * FROM loging WHERE ampere > 5");
  return $exec->num_rows;
}


?>