class Task extends Object{
    constructor(name,from,desc,reward,type){
        super();
        this._name = name;
        this._from = from;
        this._description = desc;
        this._reward = reward;
        this._type = new TaskType(type);
        this._progress = 0;
        this._types = [];
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
        this._types = {
            // Powerpoint Dia's
            "Powerpoint_Learning" : 4.0,
            "powerpoint" : 2.0,
            // Video Tapes
            "VideoTapes_Learning" : 4.0,
            "videobanden" : 2.0,
            // Photoshop
            "photoshop_Learning" : 1.0,
            "photoshop" : 1.2,
            // Coffee Mugs. Very important.
            "Mugs_Learning" : 3.0,
            "coffee mugs" : 1.5,
            // Video Editing
            "Video_Learning" : 2.0,
            "Video" : 1.0
        }; 
        function validate(self,type){
            var theMultiplier;
            if(self._types[type] != null){
                theMultiplier = self._types[type];
                return type,theMultiplier
            }
            else{
                return new Error("INVALID_TYPE");
            }
        };
        this._type,this._multiplier = validate(this,type);
        
        
    }
    get type(){
        return this._type;
    }
    set type(newType){
        this._type = newType;
    }
    get multiplier(){
        return this._multiplier;
    }
    set multiplier(newMult){
        this._multiplier = newMult;
    }


    getTypeFromString(type){
        var theMultiplier;
        if(this.types[type] != null){
            theMultiplier = this.types[type];
            return type,theMultiplier
        }
        else{
            return new Error("INVALID_TYPE");
        }
    }
}