class Character extends Object{
    constructor(name,exp){
        super();
        this._name = name;
        this.experience = new Experience(exp);
    }

    get name(){
        return this._name;
    }

    set name(newName){
        this._name = name;
    }
}