class Task extends Object{
    constructor(name,from,desc,reward,type){
        super();
        this._name = name;
        this._from = from;
        this._description = desc;
        this._reward = reward;
        this._type = new TaskType(type);
        this._progress = 0;
    }
    get name(){
        return this._name;
    }
    get from(){
        return this._from;
    }
    get description(){
        return this._description;
    }
    get reward(){
        return this._reward;
    }
    get type(){
        return this._type;
    }
    get progress(){
        return this._progress;
    }
    set progress(newProgress){
        this._progress = newProgress;
    }
}

class TaskType extends Object{
    constructor(type){
        super();
        this._type,this._multiplier = getTypeFromString(type);
        
        this._types = [
            // Powerpoint Dia's
            ["Powerpoint_Learning"] = 4.0,
            ["powerpoint"] = 2.0,
            // Video Tapes
            ["VideoTapes_Learning"] = 4.0,
            ["videobanden"] = 2.0,
            // Photoshop
            ["photoshop_Learning"] = 1.0,
            ["photoshop"] = 1.2,
            // Coffee Mugs. Very important.
            ["Mugs_Learning"] = 3.0,
            ["coffee mugs"] = 1.5,
            // Video Editing
            ["Video_Learning"] = 2.0,
            ["Video"] = 1.0,
        ]; 
    }
    getTypeFromString(type){
        var theMultiplier;
        if(this._types[type] != null){
            theMultiplier = this._types[type];
            return type,theMultiplier
        }
        return Error;
    }
}