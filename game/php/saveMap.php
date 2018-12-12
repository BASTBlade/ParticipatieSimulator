<?php
if(isset($_POST["map"])){
    var_dump($_POST["map"]["mapName"]);
    $tiles = $_POST["map"][0];
    echo $_POST["map"][1];
    foreach($tiles as $tile){
        
    }
}

?>