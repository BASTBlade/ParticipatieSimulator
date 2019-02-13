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
    $data = $mysql->getMap(6);
    ?>
    <div id="pageContent">
        <div class="game">
        </div>
    </div>
  <!--<script src="main.js"></script>-->
    <script>
        var mapmanager = new MapManager();
        var map = mapmanager.createMap(<?php echo $data["id"]; ?>,"<?php echo $data["name"]; ?>","<?php echo $data["creator_id"]; ?>", <?php echo json_encode($data["tiles"]); ?>);
        mapmanager.drawMap(map);
    </script>

    </body>
</html>