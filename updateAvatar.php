<?php
session_start();
if ($_SESSION['loggedIn'] == 1) {
    require_once "DataBaseConnection.php";
    $rawdata = $_GET["data"];
    $jsondata = base64_decode($rawdata);
    $data = json_decode($jsondata, true);
    $avatar = intval($data['Avatar']);

    $sql = "UPDATE `Users` SET `avatar`=\"" . $avatar . "\" where Name=\"" . $_SESSION['userName'] . "\"";
    $result = $con->query($sql);
    if ($result) echo "true";
    else echo "false";
} else echo "false";
