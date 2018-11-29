<!DOCTYPE html>
<?php include("functions.php")?>
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
        <form action="accounts.php" method="post" class="form login" name="loginForm">
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
            <button type="submit" name="loginFormSubmit" class="btn btn-primary">Log in</button>
        </form>
    </div>


    <script>
        $("#usernameHelp").text(messages.USERNAME_HELP);
        $("#passwordHelp").text(messages.PASSWORD_HELP);
    </script>

    </body>
</html>