<!DOCTYPE html>
<?php include("php/functions.php")?>
<html>
  <head>
    <?php 
        includeHeader();
        includeAllJavascriptFiles();
    ?>
    <meta charset="utf-8">
    <title>Log-in</title>
</head>

<body>
        <?php showNavBar(); ?>
    <div id="pageContent">
    </div>
  <!--<script src="main.js"></script>-->

<script>
    var mapManager = new MapManager();
    var con = new XMLHttpRequest();
       
    con.open("GET","maps/maps.xml");
    con.setRequestHeader("Content-Type","text/xml");
    con.send();
    con.onload = handler;

    function handler(){
        if(this.status == 200 && this.responseXML != null &&this.responseXML) {
            getObjects(this.responseXML);
        } 
        else{
            console.log("unable to get maps");
        }
    }
    function getObjects(xmlDoc){
        for(var i = 0; i < xmlDoc.childNodes.length; i++){
            var map = xmlDoc.childNodes[i];
            var name,image,rows,cols;
            if(map.getElementsByTagName("name")[0].textContent.toString() != null){
                name = map.getElementsByTagName("name")[0].textContent.toString();
            }
            if(map.getElementsByTagName("background")[0].textContent.toString() != null){
                image = map.getElementsByTagName("background")[0].textContent.toString();
            }
            if(map.getElementsByTagName("rows")[0].textContent != null){
                rows = map.getElementsByTagName("rows")[0].textContent;
            }
            if(map.getElementsByTagName("cols")[0].textContent != null){
                cols = map.getElementsByTagName("cols")[0].textContent;
            }
            if(map.getElementsByTagName("id")[0].textContent != null){
                id = map.getElementsByTagName("id")[0].textContent;
            }
          
          //var map = new Map(height,width,image);
            mapManager.createMap(rows,cols,image,id);
            mapManager.drawMap(mapManager.maps[0]);
        }

        
          //var map = new Map(0,0,null);
          //map.draw(nodes);
    }
      
</script>

    </body>
</html>