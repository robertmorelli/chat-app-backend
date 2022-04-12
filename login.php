<?php
session_start();
require_once "DataBaseConnection.php";
$rawdata = $_GET["data"];
$jsondata = base64_decode($rawdata);
$data = json_decode($jsondata, true);

$username = base64_encode($data['Name']);
$password = $data['Password'];

echo $username;

$Hashed = hash("ripemd128", $password);
$sql = "SELECT * FROM `Users` where Name=\"$usename\" AND Password=\"$Hashed\";";
$result = $con->query($sql);
if (!$result) {
    $message = "Whole query " . $sql;
    echo $message;
    die("Invalid query: " . mysqli_error($con));
} else {
    $count = $result->num_rows;
    if($count==1){
        echo "true";
    }
    else{
        $message = "Whole query " . $sql;
        echo $message;
    }
}
