<?php
include_once("mysql.php");
$mysql = new MySql();
session_start();

if(isset($_POST["myData"])){
    $data = json_decode($_POST["myData"], true);
    $mapname = $data["name"];
    echo $mysql->saveMapToDatabase($mapname,$data["tiles"]);
}

?>