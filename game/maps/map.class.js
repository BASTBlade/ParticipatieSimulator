class Map extends Object{
    constructor(id,rows,cols,image,coords){
        super();
        this._rows = rows;
        this._cols = cols;
        this._image = image;
        this._id = id;
        this._coords = coords;
        this._tiles;
    }

    get rows(){
        return this._rows;
    }
    set rows(newrows){
        this._rows = newrows;
    }

    get cols(){
        return this._cols;
    }
    set cols(newcols){
        this._cols = newcols;
    }

    get image(){
        return this._image;
    }
    set image(newImage){
        this._image = newImage;
    }

    get tiles(){
        return this._tiles;
    }
    set tiles(newTiles){
        this._tiles = newTiles;
    }

    get id(){
        return this._id;
    }
    set id(newId){
        this._id = newId;
    }
    
    get coords(){
        return this._coords;
    }
    set coords(newCoords){
        this._coords = newCoords;
    }

}