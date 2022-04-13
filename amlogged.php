<?php
session_start();
print_r($_SESSION);
if ($_SESSION["loggedIn"] == 1) echo "true";
else echo "false";
