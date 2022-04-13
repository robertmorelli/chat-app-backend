<?php
session_start();
require_once "DataBaseConnection.php";
$rawdata = $_GET["data"];
$jsondata = base64_decode($rawdata);
$data = json_decode($jsondata, true);
$username = base64_encode($data['Name']);
$password = $data['Password'];
$avatar = $data['Avatar'];

$sql = "SELECT * FROM `Users` where Name=\"$username\";";
$result = $con->query($sql);
if ($result)
    if ($result->num_rows == 0) {
        $Hashed = hash("ripemd128", $password);
        $sql = 'INSERT INTO `Users`( `Name`, `Password`, `avatar`,  `active`) VALUES ("' . $username . '","' . $Hashed . '",' . $avatar . ',1)';
        $result = $con->query($sql);
        if ($result) {
            $_SESSION['userId'] = $row['userId'];
            $_SESSION['userName'] = $row['Name'];
            $_SESSION['loggedIn'] = true;
            echo "true";
        } else echo "false";
    } else echo "false";
else echo "false";
