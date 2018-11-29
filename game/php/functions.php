<?php
    function includeHeader(){
        $path = "http://localhost/game/";
    ?>
        <link rel="stylesheet" href="<?php echo $path;?>libs/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $path;?>libs/jquery-ui/jquery-ui.min.css">
        <link rel="stylesheet" href="<?php echo $path;?>libs/jquery-ui/jquery-ui.structure.min.css">
        <link rel="stylesheet" href="<?php echo $path;?>libs/jquery-ui/jquery-ui.theme.min.css">
        <script src="<?php echo $path;?>libs/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="<?php echo $path;?>css/style.css">
        <script src="<?php echo $path;?>libs/bootstrap.js"></script>
        <script src="<?php echo $path;?>libs/jquery-ui/jquery-ui.min.js"></script>
    <?php
    }

    function includeAllJavascriptFiles(){
        $path = "http://localhost/game/";
        ?>
        <script src="<?php echo $path;?>classes\character.class.js"></script>
        <script src="<?php echo $path;?>classes/npc.class.js"></script>
        <script src="<?php echo $path;?>classes/experience.class.js"></script>
        <script src="<?php echo $path;?>classes/player.class.js"></script>
        <script src="<?php echo $path;?>classes/participant.class.js"></script>
        <script src="<?php echo $path;?>classes/task.class.js"></script>

            <!-- Managers Objects -->
        <script src="<?php echo $path;?>managers/manager.class.js"></script>
        <script src="<?php echo $path;?>managers/mainmanager.class.js"></script>
        <script src="<?php echo $path;?>managers/charactermanager.class.js"></script>
        <script src="<?php echo $path;?>managers/npcmanager.class.js"></script>
        <script src="<?php echo $path;?>managers/experiencemanager.class.js"></script>
        <script src="<?php echo $path;?>managers/playermanager.class.js"></script>
        <script src="<?php echo $path;?>managers/participantmanager.class.js"></script>
        <script src="<?php echo $path;?>managers/taskmanager.class.js"></script>

            <!-- Map Objects -->
        <script src="<?php echo $path;?>maps/map.class.js"></script>
        <script src="<?php echo $path;?>maps/tile.class.js"></script>
        <script src="<?php echo $path;?>maps/mapmanager.class.js"></script>

        <script src="<?php echo $path;?>scripts/creator.js"></script>
        <script src="<?php echo $path;?>scripts/messages.js"></script>

        <?php
    }

    function showNavBar(){
        $path = "http://localhost/game/";
        ?>
        <nav class="navbar">
            <a class="navbar-brand" href="<?php echo $path;?>index.html">Participatie Simulator</a>
            <a class="link" href="<?php echo $path;?>">Home</a>
            <a class="link" href="<?php echo $path;?>map-creator.php">Map Creator</a>
            <a class="link" href="<?php echo $path;?>php/login.php">Login</a>
        </nav>
        <?php
    }
?>