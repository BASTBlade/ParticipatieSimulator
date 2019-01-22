<!DOCTYPE html>
<?php include("php/functions.php")?>
<html>
  <head>
    <?php 
        includeHeader();
        includeAllJavascriptFiles();
        getRequirements();
    ?>
    <meta charset="utf-8">
    <title>Participatie Simulator</title>
</head>

<body>
    <?php showNavBar(); 
    
        
    $mysql = new MySql();
    $data = $mysql->getMap(4);
    ?>
    <div id="pageContent">
        
    </div>
  <!--<script src="main.js"></script>-->
    <script>
        var mapmanager = new MapManager();
        console.log(<?php echo $data["id"]; ?>,"<?php echo $data["name"]; ?>","<?php echo $data["creator_id"]; ?>", <?php echo json_encode($data["tiles"]); ?>);
        mapmanager.createMap(<?php echo $data["id"]; ?>,"<?php echo $data["name"]; ?>","<?php echo $data["creator_id"]; ?>", <?php echo json_encode($data["tiles"]); ?>);

        console.log(mapmanager.maps);
    </script>

    </body>
</html>