class Tile extends Object{
    constructor(image,absolete){
        super();
        this.images = [
            "tiles/tile_circle.png",
            "tiles/tile_strip.png"
        ]
        this._image = this.images[image];
        this._absolete = absolete;
        this._col;
        this._row;
        this._x;
    }

    get image(){
        return this._image;
    }
    set image(newImage){
        this._image = newImage;
    }

    get absolete(){
        return this._absolete;
    }
    set absolete(a){
        this._absolete = a;
    }

    get col(){
        return this._col;
    }
    set col(newCol){
        this._col = newCol;
    }

    get row(){
        return this._row;
    }
    set row(newRow){
        this._row = newRow;
    }

    get x(){
        return this._x;
    }
    set x(newX){
        this._x = newX;
    }
}