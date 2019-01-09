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
    $mysql->getMap(3);
    ?>
    <div id="pageContent">
        
    </div>
  <!--<script src="main.js"></script>-->

<script>
      
</script>

    </body>
</html>