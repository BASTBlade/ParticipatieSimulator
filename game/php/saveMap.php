<?php
if(isset($_POST["myData"])){
    $tiles = $_POST["myData"];
    foreach($tiles as $tile){
        echo $tile["position"];
    }
}

?>