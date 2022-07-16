<?php 
header("Content-Type: application/json");

include "../koneksi.php";

$json = [
  "tgl" => [],
  "total" => []
];

$sql = "SELECT DATE_FORMAT(onupdate, '%d') AS tgl, COUNT(ampere) AS total 
  FROM loging 
  WHERE ampere > 1 
  GROUP BY DATE_FORMAT(onupdate, '%m-%d')";
  

$exec = $conn->query($sql);
if($exec->num_rows > 0) {
  while($row = $exec->fetch_assoc()) {
    array_push($json["tgl"], $row["tgl"]);
    array_push($json["total"], $row["total"]);
  }
} else {
  echo $conn->error;
}

// echo countReport();

echo json_encode($json);