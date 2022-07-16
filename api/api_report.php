<?php
header("Content-Type: application/json");

include "../koneksi.php";

// GET Data JSON from URL
// $response = get_web_page("localhost/iot/api/api_volt.php");
// echo $response;
$json = [];
//GET JSON to Array
$sql = "SELECT * FROM loging WHERE ampere > " .$limitCurrent;

$exec = $conn->query($sql);
  array_push($json, $exec->num_rows);


echo json_encode($json);