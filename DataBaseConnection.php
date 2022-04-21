<?php
$host = "localhost";
$user = "roberace_myself";
$password = ")*M*K(_)*_)(K*_";
$dbname = "roberace_chatRoom";
$con = new mysqli($host, $user, $password, $dbname) or die("false");
if ($con->connection_error != FALSE) echo "false";
