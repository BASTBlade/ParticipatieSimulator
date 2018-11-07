class MapManager extends Manager{
    constructor(){
        super();
        this._maps = [];
    }

    createMap(height,width,image,id){
        var map = new Map(id,height,width,image);
        
        this._maps[this._maps.length] = map;
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