<!DOCTYPE html>
<?php include("functions.php");
    getRequirements();
    $mysql = new MySql();
    $warning = false;
    if(isset($_POST["loginFormSubmit"])){
        if(isset($_POST["username"]) && isset($_POST["password"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            if($mysql->login($username,$password)){

                header("Location: ../");
                die();
            }
            else{
                $warning = "Invalid credentials given.";
            }
        }

    }
?>
<html>
  <head>
    <?php 
        includeHeader();
        includeAllJavascriptFiles();
    ?>
    <meta charset="utf-8">
    <title>Log-in</title>
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
                <label for="password">Password: </label>
                <input name="password" type="password" class="form-control" id="password" aria-describedby="password" placeholder="password" required>
                <small id="passwordHelp" class="form-text text-muted"></small>
            </div>
            <a href="register.php" class="form-text text-muted" style="float:right;"> Register</a><br><br>
            <a href="recoveraccount.php" class="form-text text-muted" style="float:right;"> Recover Account</a>
            <button type="submit" name="loginFormSubmit" class="btn btn-primary">Log in</button>
        </form>
    </div>


    <script>
        $("#usernameHelp").text(messages.USERNAME_HELP);
        $("#passwordHelp").text(messages.PASSWORD_HELP);
    </script>
    <?php
        if($warning != null || !$warning ){
            ?><script>$(".warning").text("<?php echo $warning;?>");</script><?php
        }
    ?>
    </body>
</html>