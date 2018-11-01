class Participant extends NPC{
    constructor(name,exp){
        super();
        this._name = name;
        this._experience = new Experience(exp);
    }
}