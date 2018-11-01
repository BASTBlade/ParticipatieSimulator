class Player extends Character{
    constructor(name,exp){
        super();
        this._name = name;
        this._experience = new Experience(exp);
    }
}