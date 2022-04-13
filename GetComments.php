<?php
session_start();
if ($_SESSION['loggedIn'] == 1) {
    require_once "DataBaseConnection.php";

    $comments = 0;
    if (isset($_SESSION["lastComment"])) $comments = $_SESSION["lastComment"];

    $sql = "SELECT senderName,commentText,commentTime,commentID FROM `Comments` where commentID>$comments;";
    $result = $con->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $loc = false;
            while ($Array = $result->fetch_assoc()) {
                if ($loc) echo ";";
                else $loc = true;
                echo $Array["senderName"] . ',' . $Array["commentText"] . ',' . $Array["commentTime"] . ',' . $Array["commentID"];
                if (intval($Array["commentID"]) > $_SESSION["lastComment"]) $_SESSION["lastComment"] = intval($Array["commentID"]);
            }
        } else echo "false";
    } else echo "false";
}
