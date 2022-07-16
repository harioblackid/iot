<?php
header("Content-Type: application/json");
include "../koneksi.php";

$label = [];
$voltMin = [];
$voltMax = [];

$ampereMin = [];
$ampereMax = [];

$powerMin = [];
$powerMax = [];

$freqMin = [];
$freqMax = [];

$json = [
  "label" => $label,
  "voltMin" => $voltMin,
  "voltMax" => $voltMax,

  "ampereMin" => $ampereMin,
  "ampereMax" => $ampereMax,

  "powerMin" => $powerMin,
  "powerMax" => $powerMax,

  "freqMin" => $freqMin,
  "freqMax" => $freqMax
];

$sqlcek = "SELECT DISTINCT TIME_FORMAT(onupdate, '%H:%i') AS waktu, onupdate
FROM loging GROUP BY waktu
ORDER BY onupdate DESC
LIMIT 0, 10
";

$cektime = $conn->query($sqlcek);
while ($row = $cektime->fetch_assoc()) {
  $between = getTimeBetween($row['waktu']);

  $result = $conn->query(runReport($between));
  if($result->num_rows > 0) {
    $data = $result->fetch_assoc();

    //Push data into JSON
    array_push($json["label"], $data['time']);
    
    array_push($json["voltMin"], $data['voltMin']);
    array_push($json["voltMax"], $data['voltMax']);
    array_push($json["ampereMin"], $data['ampereMin']);
    array_push($json["ampereMax"], $data['ampereMax']);
    array_push($json["powerMin"], $data['powerMax']);
    array_push($json["powerMax"], $data['powerMax']);
    array_push($json["freqMin"], $data['freqMin']);
    array_push($json["freqMax"], $data['freqMax']);

  } 
  else {
    echo $conn->error;
  }

}

// $result = $conn->query("SELECT volt, onupdate FROM loging ORDER BY onupdate DESC LIMIT 0, 10");
// if($result->num_rows > 0) {
//   while($row = $result->fetch_assoc()){
//     $json["label"][] = get_time($row['onupdate']);
//     $json["volt"][] = $row['volt'];
//   }

//   echo json_encode($json);
// }
// else {
//   echo "Error: " . $conn->error;
// }

echo json_encode($json);
