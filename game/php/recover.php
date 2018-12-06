<!DOCTYPE html>
<?php include("functions.php");
    getRequirements();
    $mysql = new MySql();
    $warning = false;
    if(isset($_POST["recoveryFormSubmit"])){
        if(isset($_POST["key"]) && isset($_POST["password"]) && isset($_POST["passwordConfirm"])){
            $key = $_POST["key"];
            $password = $_POST["key"];
            if($password == $_POST["passwordConfirm"]){

            }
            else{
                $warning = "Passwords do not match.";
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
    <title>Recover</title>
  </head>

  <body>
      <?php showNavBar(); ?>
    <div id="">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form login" name="loginForm">
            <div class="form-group">
                <label for="key">Recovery Key: </label>
                <input type="text" name="key" class="form-control" id="key" aria-describedby="key" placeholder="key" required>
                <small id="keyHelp" class="form-text text-muted"></small>
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
            <button type="submit" name="recoveryFormSubmit" class="btn btn-primary">Set Password</button>
        </form>
    </div>


    <script>
        $("#passwordHelp").text(messages.RECOVERY_PASSWORD);
        $("#passwordConfirmHelp").text(messages.PASSWORD_CONFIRM);
        $("#keyHelp").text(messages.RECOVERY_KEY);
    </script>
    <?php
        if($warning != null || !$warning ){
            ?><script>$(".warning").text("<?php echo $warning;?>");</script><?php
        }
    ?>
    </body>
</html>