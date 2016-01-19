<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manager</title>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <form class="form-signin">
<?php



$do = filter_input(INPUT_GET, 'do', FILTER_SANITIZE_STRING);
switch ( $do  ) {

  default:
  case 'login':
    ?>
      <h2 class="form-signin-heading">Please sign in</h2>
      <label for="inputUser" class="sr-only">Usuario</label>
      <input type="text" id="inputUser" class="form-control" placeholder="Usuario" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
      <div>
          <label class="black">
            <a href="#a">No recuerdo mi contraseña</a>
          </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

    <?php
    break;


  case 'changepwd':
    ?>
      <h2 class="form-signin-heading">Change password</h2>
      <label for="inputActualPass" class="sr-only">Write your password</label>
      <input type="password" id="inputActualPass" class="form-control" placeholder="Write your password" required autofocus>
      
      <label for="inputWritePass" class="sr-only">Write your new password</label>
      <input type="password" id="inputWritePass" class="form-control" placeholder="Write your new password" required>
      
      <label for="inputReWritePass" class="sr-only">Rewrite your new password</label>
      <input type="password" id="inputReWritePass" class="form-control" placeholder="Rewrite your new password" required>
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Change</button>


    <?php
    break;
}
?>  
      </form>
    </div>
  </body>
</html>
