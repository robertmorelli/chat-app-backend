<?php
session_start();
if ($_SESSION['loggedIn'] == 1) {
    require_once "DataBaseConnection.php";
    $rawdata = $_GET["data"];
    $jsondata = base64_decode($rawdata);
    $data = json_decode($jsondata, true);
    $usernamenew = base64_encode($data['NameNew']);
    $avatar = intval($data['Avatar']);

    $sql = "UPDATE `Users` SET `Name`=\"" . $usernamenew . "\",`avatar`=\"" . $avatar . "\" where Name=\"" . $_SESSION['userName'] . "\"";
    $result = $con->query($sql);
    if ($result) {
        $_SESSION['userName'] = $usernamenew;
        echo "true";
    } else echo "false";
} else echo "false";
