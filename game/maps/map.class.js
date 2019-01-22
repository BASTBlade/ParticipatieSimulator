class Map extends Object{
    constructor(id,name,creatorId,tiles){
        super();

        this._tiles = tiles;
        this._name = name;
        this._creatorId = creatorId;
        this._id = id
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

    get name(){
        return this._name;
    }
    set name(newName){
        this._name = newName;
    }

    get creatorId(){
        return this._creatorId;
    }
    set creatorId(newCreatorId){
        this._creatorId = newCreatorId;
    }
}