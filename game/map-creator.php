<!DOCTYPE html>
<?php include("php/functions.php")?>
<html>
  <head>
    <?php 
        includeHeader();
        includeAllJavascriptFiles();
        getRequireMents();
    ?>
    <meta charset="utf-8">
    <title>Participatie Simulator Map-Creator</title>
  </head>

  <body>
      <?php showNavBar(); ?>
    <div id="pageContent">
        <script>
            $(document).ready(function(){
                drawTable();
                drawImagesList();
            });

        </script>
        
        <div class="ui-widget warning" style="display:none;" onclick="toggleWarning(this);">
                <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
                    <p>
                        <span class="ui-icon ui-icon-alert" 
                        style="float: left; margin-right: .3em;"></span>
                        <span class="warningtext"></span>
                    </p>
                </div>
            </div>
        <div id="tiles">
            <div id="images">
                <div class="block">
                    <p>
                        Select an image and add it onto the cell.
                    </p>
                    <br>
                    <input type="file" id="file" name="file" /> <br>
                    <button id="upload" onclick="uploadFile();">Upload Image</button>
                </div>
                <br>
                <div class="block">
                    <img src="" alt="" id="previewImage">
                    <button class="btn-info btn" id="addImageButton" onclick="imageButtonClicked();">Set</button>
                    <br>
                </div>
            </div>
            <div class="block">
                <button class="btn-info btn" id="setStartTile" onclick="setStartTile()">Start Tile</button>
            </div>
        </div>
        <div id="creator">
            <p>
                Select a Cell to edit this cell.
            </p>
        </div>
    </div>
  </body>
</html>