
<?php
//session_start();
//if (!isset($_SESSION['user'])) {
//    echo "not logged in";
//} else {
require_once "DataBaseConnection.php";


//make quert for
$sql = "SELECT Name FROM `Users` where `active`=1;";

//WHERE `timestamp` >= CURRENT_TIMESTAMP - INTERVAL 5 MINUTE
$result = $con->query($sql);

if (!$result) {
    $message = "Whole query " . $sql;
    echo $message;
    die("Invalid query: " . mysqli_error($con));
}
$loc = false;
while ($Array = $result->fetch_row()) {
    if ($loc) echo ";";
    else $loc = true;
    echo $Array[0] . ',' . $Array[1] . ',' . $Array[2];
}
//}
