<?php
session_start();
if ($_SESSION['loggedIn'] == 1) {
    require_once "DataBaseConnection.php";
    $rawdata = $_GET["data"];
    $jsondata = base64_decode($rawdata);
    $data = json_decode($jsondata, true);

    $rawtext = $data['Comment'];
    $text = base64_encode($rawtext);

    $sql = 'INSERT INTO `Comments`(`commentText`, `senderName`) VALUES ( "' . $text . '", "' . $_SESSION['userName'] . '")';
    $result = $con->query($sql);

    if ($result) echo "true";
    else echo "false";
} else echo "false";