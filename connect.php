<?php

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "dbfauzan";

$con = new mysqli($localhost, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
