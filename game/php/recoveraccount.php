<!DOCTYPE html>
<?php include("functions.php");
    getRequirements();
    $mysql = new MySql();
    $warning = false;
    if(isset($_POST["recoveryFormSubmit"])){
        if(isset($_POST["username"]) && isset($_POST["email"])){
            $username = $_POST["username"];
            $email = $_POST["email"];
            $exists = $mysql->usernameExists($username);
            if($exists != null){
                $data = $mysql->getDataFromId($exists);
                if($data["email"] == $email){
                    $recoverykey = random_str(32);
                    $mysql->setRecoveryKey($data["id"],$recoverykey);
                    sendRecoveryMail($email,$username,$recoverykey);
                    
                    header("Location: ../");
                    die();
                }
                else{
                    $warning = "This combination is not valid.";
                }
            }
            else{
                $warning = "This combination is not valid.";
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
    <title>Account recovery</title>
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
            <button type="submit" name="recoveryFormSubmit" class="btn btn-primary">Send Email</button>
        </form>
    </div>


    <script>
        $("#usernameHelp").text(messages.RECOVER_USERNAME);
        $("#emailHelp").text(messages.RECOVER_EMAIL);
    </script>
    <?php
        if($warning != null || !$warning ){
            ?><script>$(".warning").text("<?php echo $warning;?>");</script><?php
        }
    ?>
    </body>
</html>