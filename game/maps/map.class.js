class Map extends Object{
    constructor(height,width,image){
        super();
        this._height = height;
        this._width = width;
        this._image = image;
    }

    get height(){
        return this._height;
    }
    set height(newHeight){
        this._height = newHeight;
    }

    get width(){
        return this._width;
    }
    set width(newWidth){
        this._width = newWidth;
    }

    get image(){
        return this._image;
    }
    set image(newImage){
        this._image = newImage;
    }
    draw(xml,id){

    }
}