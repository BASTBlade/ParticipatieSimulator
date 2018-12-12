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

    function isLoggedin(){
        if(isset($_SESSION["loggedin"])){
            return true;
        }
        elseif(isset($_COOKIE["loggedin"])){
            return true;
        }
        else{
            return false;
        }
    }

    function showNavBar(){
        $path = "http://localhost/game/";
        ?>
        <nav class="navbar">
            <a class="navbar-brand" href="<?php echo $path;?>index.html">Participatie Simulator</a>
            <a class="link" href="<?php echo $path;?>">Home</a>
            <a class="link" href="<?php echo $path;?>map-creator.php">Map Creator</a>

            <span style="float:right;">
                <?php 
                if(isset($_POST["logout"])){
                    logout();
                }
                if(isset($_SESSION["loggedin"])){?>
                    Logged in as: <?php echo $_SESSION["loggedin"]["username"];
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="logoutForm" style="float:right;">
                        <input type="submit" name="logout" value="Log Out" class="btn btn-danger" >
                    </form>
                    <?php
                }
                else{
                    ?> 
                    <a class="link" href="<?php echo $path;?>php/login.php">Login</a><?php
                }

                if(!isset($_SESSION["loggedin"]) && isset($_COOKIE["loggedin"])){
                    $_SESSION["loggedin"] = json_decode($_COOKIE["loggedin"]);
                }
                ?>
            </span>
        </nav>
        <?php
    }

    function getRequirements(){
        @include_once("php/secret.php");
        @include_once("../php/secret.php");

        @include_once("php/mysql.php");
        @include_once("../php/mysql.php");
        
        session_start();
    }

    function login($account,$remember){
        if($remember){
            setcookie("loggedin",json_encode($account));
        }
        $_SESSION["loggedin"] = $account;
    }
    function logout(){
        if(isset($_SESSION["loggedin"])){
            unset($_SESSION["loggedin"]);
            $_SESSION["loggedin"] = null;
        }
        if(isset($_COOKIE["loggedin"])){
            unset($_COOKE["loggedin"]);
            setcookie("loggedin",'',time() - 3600);
        }
    }


    function sendRecoveryMail($email,$username,$key){
        $to = $email;
        $subject = "Password Recovery Request";
        $message = "
            <html>
                <body>
                    url: test.com/php/recover.php
                    key: ". $key . "
                    username: " . $username . "
                </body>
            </html>
        ";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        $headers .= 'From: <admin@participatiesimulator.nl>' . "\r\n";
        mail($to,$subject,$message,$headers);

    }

    
    function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
?>