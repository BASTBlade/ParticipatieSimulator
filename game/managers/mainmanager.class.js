class MainManager extends Manager{
    constructor(){
        super();
        this._NPCmanager = new NPCManager();
        this._ExperienceManager = new ExperienceManager();
        this._CharacterManager = new CharacterManager();
        this._ParticipantManager = new ParticipantManager();
        this._PlayerManager = new PlayerManager();
        this._TaskManager = new TaskManager();
    }
    get ExperienceManager(){
        return this._ExperienceManager;
    }
}