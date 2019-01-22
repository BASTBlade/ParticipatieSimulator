class MapManager extends Manager{
    constructor(){
        super();
        this._maps = [];
    }


    createMap(mapId,mapName,creatorId,tiles){
        this._maps[this._maps.length + 1] = new Map(mapId,mapName,creatorId,this.createTiles(tiles));
    }
    createTiles(tiles){
        var allTiles = [];
        for(var tile = 0; tile < tiles.length; tile++){
            allTiles[allTiles.length + 1] = new Tile(false,tiles[tile]["tile_id"],tiles[tile]["map_id"],tiles[tile]["starttile"],tiles[tile]["background"],tiles[tile]["maprow"],tiles[tile]["position"]);
            
        }
        return allTiles;
    }

    get maps(){
        return this._maps;
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