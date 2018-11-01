class NPC extends Character{
    constructor(name,exp){
        super();
        this._name = name;
        this._exp = new Experience(exp);
    }
}