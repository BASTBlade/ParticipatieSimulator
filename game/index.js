/******************************************************************************
* Project: Leviaan Participatie Simulator
* JvE Games, All rights reserved.

* NOTICE: All information contained herein is, and remains the property of
* JvE Games. The intellectual and technical concepts contained herein are
* proprietary to JvE Games and are protected by trade secret and copyright law.
* Dissemination of this information or reproduction, via any medium,
* of this material is strictly forbidden unless prior written permission is
* obtained from JvE Games .
******************************************************************************/

global.core = {};

class Core{
    constructor(){
        this.load();
    }

    async load(){
        console.log('[CORE] Loading core...');

        await require('./Load/requirements.js');

        await require('./Load/classes.js');

        global.core.managers = require('./Managers');

        console.log('[CORE] Succesfully initialized!');

    }
}

new Core;