<?php
require_once "DataBaseConnection.php";


$rawdata = $_GET["data"];
$jsondata = base64_decode($rawdata);
$data = json_decode($jsondata, true);
$username = base64_encode($data['Name']);
$usernamenew = base64_encode($data['NameNew']);
$password = $data['Password'];
$avatar = $data['Avatar'];


$sql = "SELECT * FROM `Users` where Name=\"$username\";";
$result = $con->query($sql);
if (!$result) {
    $message = "Whole query " . $sql;
    echo $message;
    die("Invalid query: " . mysqli_error($con));
} else {
    $count = $result->num_rows;
    if($count==1){
        $Hashed = hash("ripemd128", $password);
        $sql="UPDATE `Users` SET `Name`=\"$usernamenew\",`avatar`=\"$avatar\" where Name=\"$username\"";
        $result = $con->query($sql);

        if (!$result) {
            echo "false";
        }
        else{
            echo "true";
        }
    }
    else{
        echo "false";
    }
}
