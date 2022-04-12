<?php
session_start();
require_once "DataBaseConnection.php";
$usernameraw = $_POST['username'];
$username = base64_decode($usernameraw);
$sql = 'SELECT * FROM `Users` where Name=' + base64_encode($usename) + ';';
$result = $con->query($sql);
if (!$result) {
    $message = "Whole query " . $sql;
    echo $message;
    die("Invalid query: " . mysqli_error($con));
} else {
    $count = $result->num_rows;
    if($count==1){
        
    }
    else{
        echo "false";
    }
}
