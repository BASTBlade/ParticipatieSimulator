class Experience extends Object{
    constructor(exp){
        super();
        this._experience = exp;
        this._level;
    }
    
    get level(){
        return this._level;
    }
    set level(newLevel){
        this._level = newLevel;
    }
    
    get experience(){
        return this._experience;
    }
    set experience(newExp){
        this._experience = newExp;
    }

    toString(){
        return this._experience
    }
}