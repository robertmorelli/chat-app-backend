
<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "not logged in";
} else {
    require_once "DataBaseConnection.php";

    $rawdata = $_GET["data"];
    $jsondata = base64_decode($rawdata);
    $data = json_decode($jsondata, true);
    $rawuser = $data['Name'];
    if (!$rawuser) {
        $rawuser = "anon";
    }
    $rawtext = $data['Comment'];
    $user = base64_encode($rawuser);
    $text = base64_encode($rawtext);

    $roomREFraw = $data['Room'];
    $roomREF = base64_encode($roomREFraw);

    $ipraw = $_SERVER['REMOTE_ADDR'];
    $ipFraw = $_SERVER['HTTP_X_FORWARDED_FOR'];

    $ip =  hash("ripemd128", $ipraw);
    $ipF =  hash("ripemd128", $ipFraw);


    $sql = 'INSERT INTO `Comments`(`commentText`, `senderName`, `senderIP`, `senderIPForward`, `roomID`, `roomREF`) VALUES ( "' . $text . '", "' . $user . '", "' . $ip . '", "' . $ipF . '", 0 , "' . $roomREF . '")';

    $result = $con->query($sql);

    if (!$result) {
        $message = "Whole query " . $sql;
        echo $message;
        die("Invalid query: " . mysqli_error($con));
    } else {
        echo "comment sent";
    }
}
?>