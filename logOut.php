<?php
session_start();
if ($_SESSION['loggedIn'] == 1) {
    $sql = "UPDATE `Users` SET `active`=0 where Name=\"".$_SESSION['userName']."\"";
    $result = $con->query($sql);
    if($result) echo "true";
    else echo "false";
} else echo "false";
session_destroy();