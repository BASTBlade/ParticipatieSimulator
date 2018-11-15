class MapManager extends Manager{
    constructor(){
        super();
        this._maps = [];
    }

    createMap(rows,cols,image,id){
        var coords = {
            ["start"] : Math.round(cols * rows - (cols / 2)),
            ["end"] : Math.round(rows / 2)
        }
        var map = new Map(id,rows,cols,image,coords);
        this.createTiles(map);
        this._maps[this._maps.length] = map;
        console.log();
    }

    createTiles(map){
        for(var column = 0; column < map.cols;column++){
            for(var row = 0; row < map.rows; row++){
                var tile = new Tile(0,false);
                var random = Math.floor((Math.random() * tile.images.length));
                tile.image = tile.images[random];
                if(map.tiles == null){
                    map.tiles = [];
                    map.tiles[0] = tile;
                }
                else{
                    map.tiles[map.tiles.length] = tile;
                }
            }
        }
    }

    get maps(){
        return this._maps;
    }
    set maps(newMaps){
        this._maps = newMaps;
    }

    getMap(id){
        var map = this._maps[id];
        if(map){
            return map;
        }
        else{
            return new Error("NO_MAP_FOUND");
        }
    }

    drawMap(map){
        var images = [];
        for(var image = 0; image < map.tiles[0].images.length;image++){
            var img = new Image();
            img.src = map.tiles[0].images[image];
            images[image] = img;
            images[image].onload = drawTile();
        }

        function drawTile(){
            var canvas = document.getElementById("theCanvas").getContext("2d");
            var col = 0;
            var row = 0;
            for(var tile = 0; tile < map.tiles.length; tile++){
                var width = $("#theCanvas").width() / 10;
                var height = $("#theCanvas").height() / 10;
                //canvas.fillRect(col,row,50,50);
                img.addEventListener('load', function() {
                    canvas.drawImage(img,width * col,height * row);
                    row++;
                    if(row >= 10){
                        col = col+1;
                        row = 0;
                    }
                  }, false);
                
                //console.log(row);
            }
        }
    }
}