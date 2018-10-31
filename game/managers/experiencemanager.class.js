class ExperienceManager extends Manager{
    
    
    constructor(){
        super();
        this.levels = [100,250,500,750,1000,1300,1600,2000,2500,3000,4000,5000,7500,10000,20000];
    
    }

    addExperience(obj,exp){
        obj.experience = obj.experience + exp;
        if(obj.experience > 20000){
            // Trigger something
        }
        var isLevel = false;
        for(var i = 0; i < this.levels.length; i++){
            if(this.levels[i] > obj.experience){
                if(!isLevel){
                    obj._level = i;
                    isLevel = true;
                }
            }
        }
        return obj.experience;
    }
    removeExperience(obj,exp){
        obj._experience = obj.experience - exp;
        if(obj.experience < 0){
            obj.experience = 0;
        }
        return obj.experience;
    }

    
}