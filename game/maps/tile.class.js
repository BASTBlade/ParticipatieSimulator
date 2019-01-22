class Tile extends Object{
    constructor(absolete,id,map_id,starttile,background,maprow,position){
        super();
        //this.images = [
        //    "maps/tiles/tile_circle.png",
        //    "maps/tiles/tile_strip.png",
        //    "maps/tiles/tile_green.png",
        //    "maps/tiles/tile_blue.png",
        //]
        this._background = background
        this._absolete = absolete;
        this._id = id;
        this._map_id = map_id;
        this._starttile = starttile;
        this._maprow = maprow;
        this._position = position;
    }

    get background(){
        return this._background;
    }
    set background(newbackground){
        this._background = newbackground;
    }

    get absolete(){
        return this._absolete;
    }
    set absolete(a){
        this._absolete = a;
    }

    get id(){
        return this._id;
    }
    set id(newId){
        this._id = newId;
    }

    get map_id(){
        return this._map_id;
    }
    set map_id(newMapId){
        this._map_id = newMapId;
    }

    get starttile(){
        return this._starttile;
    }
    set starttile(newStartTile){
        this._starttile = newStartTile;
    }

    get maprow(){
        return this._maprow;
    }
    set maprow(newMapRow){
        this._maprow = newMapRow;
    }

    get position(){
        return this._position;
    }
    set position(newPosition){
        this._position = newPosition;
    }
}