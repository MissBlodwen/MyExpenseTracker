<?php 

$server = "sql305.hstn.me";
$user = "mseet_30340326";
$pass = "hanna2021";
$database = "mseet_30340326_hannadw";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>