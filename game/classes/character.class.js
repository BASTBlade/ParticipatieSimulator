class Character extends Object{
    constructor(name,exp){
        super();
        this._name = name;
        this.experience = new Experience(exp);
        this._obj;
        this.init();
    }

    get name(){
        return this._name;
    }

    set name(newName){
        this._name = name;
    }

    init(){

    }
    moveUp(){

    }
    moveDown(){

    }
    moveLeft(){

    }
    moveRight(){

    }
    interact(){
        
    }
}