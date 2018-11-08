class MapManager extends Manager{
    constructor(){
        super();
        this._maps = [];
    }

    createMap(rows,cols,image,id,coords){
        var map = new Map(id,rows,cols,image,coords);
        this.createTiles(map);
        this._maps[this._maps.length] = map;
    }

    createTiles(map){

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
}