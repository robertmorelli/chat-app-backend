<?php
session_start();
if ($_SESSION['loggedIn'] == 1) {
    require_once "DataBaseConnection.php";

    $sql = "SELECT Name,avatar FROM `Users` where `active`=1;";
    $result = $con->query($sql);

    if ($result) {
        $loc = false;
        while ($Array = $result->fetch_row()) {
            if ($loc) echo ";";
            else $loc = true;
            echo $Array[0] . ',' . $Array[1];
        }
    } else echo "false";
}