class Tile extends Object{
    constructor(image,absolete){
        super();
        this._image = image;
        this._absolete = absolete;
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
}