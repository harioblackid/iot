<?php

$conn = new mysqli("localhost", "root", "", "iotapp");

$username = $_POST['username'];
$password = $_POST['password'];
$data = [];

//Check in DB

if($check = $conn->query("SELECT * FROM users WHERE username = \"${username}\"")) {
  if($check->num_rows > 0){
    $row = $check->fetch_object();

    // echo $row->username;
    // echo $row->PASSWORD;
    

    //check password
    if(password_verify($password, $row->PASSWORD)){
      array_push($data, ["status" => "ok"]);
      session_start();
      $_SESSION['user'] = $username;

      array_push($data, ["status" => "ok"]);
    }
    else {
      echo $conn->error;
    }
  } else {
    echo $conn->error;
  }
}

echo json_encode($data);