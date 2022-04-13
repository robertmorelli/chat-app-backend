<?php
session_start();
require_once "DataBaseConnection.php";
$rawdata = $_GET["data"];
$jsondata = base64_decode($rawdata);
$data = json_decode($jsondata, true);

$username = base64_encode($data['Name']);
$password = $data['Password'];

$Hashed = hash("ripemd128", $password);
$sql = "SELECT * FROM `Users` where Name=\"".$username."\"";
$result = $con->query($sql);
if ($result)
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($Hashed == $row["Password"]) {
            $sql = "UPDATE `Users` SET `active`=1 where Name=\"".$_SESSION['userName']."\"";
            $result = $con->query($sql);
            $_SESSION['userId'] = $row['userId'];
            $_SESSION['userName'] = $row['Name'];
            $_SESSION['loggedIn'] = true;
            echo "true";
        } else echo "false";
    } else echo "false";
else echo "false";
