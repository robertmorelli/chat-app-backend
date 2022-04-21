<?php
session_start();
if ($_SESSION['loggedIn'] == 1) {
    require_once "DataBaseConnection.php";

    $comments = 0;
    if (isset($_SESSION["lastComment"])) $comments = $_SESSION["lastComment"];

    $sql = "SELECT C.senderName,C.commentText,C.commentTime,C.commentID,U.avatar FROM `Comments` C,`Users` U WHERE C.senderName=U.Name AND commentID>$comments ORDER BY C.commentTime;";
    $result = $con->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $loc = false;
            while ($Array = $result->fetch_assoc()) {
                if (strlen(trim($Array["commentText"])) > 0) {
                    if ($loc) echo ";";
                    else $loc = true;
                    echo $Array["senderName"] . ',' . base64_encode(trim($Array["commentText"])) . ',' . $Array["commentTime"] . ',' . $Array["commentID"] . ',' . $Array["avatar"];
                    if (intval($Array["commentID"]) > $_SESSION["lastComment"]) $_SESSION["lastComment"] = intval($Array["commentID"]);
                }
            } if($loc==false) echo "false";
        } else echo "false";
    } else echo "false";
} else echo "false";
