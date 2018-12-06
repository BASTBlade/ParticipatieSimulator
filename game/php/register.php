<?php
    include("functions.php");
    getRequirements();
    $mysql = new MySql();

    
    $warning = false;
    if(isset($_POST["registerFormSubmit"])){
        if(isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["passwordConfirm"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $passwordConfirm = $_POST["passwordConfirm"];
            $email = $_POST["email"];
            if($mysql->usernameExists($username)){
                $warning = "Username already exists.";
            }
            if($password != $passwordConfirm){
                $warning = "Passwords do not match.";
            }

            if(!$warning){
                $mysql->registerAccount($username,$email,$password);
            }
        }
    }


?>
    <head>
        <?php 
            includeHeader();
            includeAllJavascriptFiles();
        ?>
        <meta charset="utf-8">
        <title>Register</title>
    </head>
    <body>
    <?php showNavBar(); ?>
    <div id="">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form login" name="loginForm">
            <p class="form-text warning"></p>
            <div class="form-group">
                <label for="username">Username: </label>
                <input type="text" name="username" class="form-control" id="username" aria-describedby="username" placeholder="username" required>
                <small id="usernameHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="email" required>
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="password">Password: </label>
                <input name="password" type="password" class="form-control" id="password" aria-describedby="password" placeholder="password" required>
                <small id="passwordHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="passwordConfirm">Confirm Password: </label>
                <input name="passwordConfirm" type="password" class="form-control" id="passwordConfirm" aria-describedby="passwordConfirm" placeholder="passwordConfirm" required>
                <small id="passwordConfirmHelp" class="form-text text-muted"></small>
            </div>
            <button type="submit" name="registerFormSubmit" class="btn btn-primary">Register</button>
        </form>
    </div>


    <script>
        $("#usernameHelp").text(messages.REGISTER_USERNAME);
        $("#passwordHelp").text(messages.REGISTER_PASSWORD);
        $("#passwordConfirmHelp").text(messages.PASSWORD_CONFIRM);
        $("#emailHelp").text(messages.REGISTER_EMAIL);
    </script>


    <?php
        if($warning != null || !$warning ){
            ?><script>$(".warning").text("<?php echo $warning;?>");</script><?php
        }
    ?>
</body>
</html>