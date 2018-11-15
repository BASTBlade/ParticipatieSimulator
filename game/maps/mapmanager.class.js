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
                var random = Math.floor((Math.random() * 2) + 1);
                var tile = new Tile(random,false);
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
        var canvas = document.getElementById("theCanvas").getContext("2d");
        var col = 0;
        var row = 0;
        for(var tile = 0; tile < map.tiles.length; tile++){
            //canvas.fillRect(col,row,50,50);
            var img = document.getElementById(tile.image);
            canvas.drawImage(img,col,row);
            row++;
            if(row >= 10){
                col = col+1;
                row = 0;
            }
            console.log(row);
        }
    }
}