
<?php
$host = "localhost";
$user = "roberace_myself";
$password = ")*M*K(_)*_)(K*_";
$dbname = "roberace_chatRoom";
$con = new mysqli($host,$user,$password,$dbname) or die("shit");
if($con->connection_error==FALSE){
}
else{
    echo "<h1>heck</h1>";
}
?>