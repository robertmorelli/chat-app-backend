<?php
require_once "DataBaseConnection.php";


$rawdata = $_GET["data"];
$jsondata = base64_decode($rawdata);
$data = json_decode($jsondata, true);

$username = $data['username'];
$password = $data['password'];
$avatar = $data['avatar'];

$sql = 'SELECT * FROM `Users` where Name="' + base64_encode($usename) + '";';
$result = $con->query($sql);
if (!$result) {
    $message = "Whole query " . $sql;
    echo $message;
    die("Invalid query: " . mysqli_error($con));
} else {
    $count = $result->num_rows;
    if($count==0){
        $Hashed = hash("ripemd128", $password);
        $sql='INSERT INTO `Users`( `Name`, `Password`, `avatar`,  `active`) VALUES ("'.$username.'","'.$Hashed.'",'.$avatar.',1)';
        $result = $con->query($sql);
    }
    else{
        echo "false";
    }
}
