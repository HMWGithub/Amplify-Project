<?php 
  include("includes/config.php");
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");

  $account = new Account($connection);

  function getInputValue($name){
    if(isset($_POST[$name])){
      echo $_POST[$name];
    }
  }

?>
<?php include("includes/handlers/register-handler.php"); ?>
<?php include("includes/handlers/login-handler.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amplify</title>
  <link rel="stylesheet" href="assets/css/register.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="assets/js/register.js"></script>
</head>
<body>
  <?php
    if(isset($_POST['register'])){
      echo '<script>
              $(document).ready(function(){
                $("#registerForm").show();
                $("#loginForm").hide();
              });
            </script>';
    } else {
      echo '<script>
              $(document).ready(function(){
                $("#loginForm").show();
                $("#registerForm").hide();
              });
            </script>';
    }
  ?>
  <div id="background">
    <div id="loginContainer">
      <div id="inputContainer">
        <!-- LOGIN FORM -->
        <form id="loginForm" action="register.php" method="POST">
          <h2>Login to your account</h2>
          <p>
            <p><?php echo $account->getError(Constants::$loginFailed); ?></p>
            <label for="loginUsername">Username</label>
            <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. AmplifyUser123" value="<?php echo getInputValue('loginUsername')?>" required>
          </p>
          <p>
            <label for="loginPassword">Password</label>
            <input id="loginPassword" name="loginPassword" type="password" required>
          </p>

          <button type="submit" name="login">LOG IN</button>

          <div class="hasAccountText">
            <a href="#" ><span id="loginHide">Don't have an account yet? Sign up here</span></a>
          </div>
        </form> <!-- END -->

        <!-- REGISTER FORM -->
        <form id="registerForm" action="register.php" method="POST">
          <h2>Create your free account</h2>
          <p>
            <p><?php echo $account->getError(Constants::$usernameInvalidLength); ?></p>
            <p><?php echo $account->getError(Constants::$usernameTaken); ?></p>
            <label for="registerUsername">Username</label>
            <input id="registerUsername" name="registerUsername" type="text" placeholder="e.g. AmplifyUser123" value="<?php getInputValue('registerUsername')?>" required>
          </p>
          <p>
            <p><?php echo $account->getError(Constants::$firstNameInvalidLength); ?></p>
            <label for="registerFirstname">Firstname</label>
            <input id="registerFirstname" name="registerFirstname" type="text" placeholder="e.g. John" value="<?php getInputValue('registerFirstname')?>" required>
          </p>
          <p>
            <p><?php echo $account->getError(Constants::$lastNameInvalidLength); ?></p>
            <label for="registerLastname">Lastname</label>
            <input id="registerLastname" name="registerLastname" type="text" placeholder="e.g. Smith" value="<?php getInputValue('registerLastname')?>" required>
          </p>
          <p>
            <p><?php echo $account->getError(Constants::$emailsDoNotMatch); ?></p>
            <p><?php echo $account->getError(Constants::$emailInvalidFormat); ?></p>
            <p><?php echo $account->getError(Constants::$emailTaken); ?></p>
            <label for="registerEmail">Email</label>
            <input id="registerEmail" name="registerEmail" type="email" placeholder="e.g. john@gmail.com" value="<?php echo getInputValue('registerEmail')?>" required>
          </p>
          <p>
            <label for="registerEmail2">Confirm Email</label>
            <input id="registerEmail2" name="registerEmail2" type="email" placeholder="e.g. john@gmail.com" value="<?php echo getInputValue('registerEmail2')?>" required>
          </p>
          <p>
            <p><?php echo $account->getError(Constants::$passwordsDoNotMatch); ?></p>
            <p><?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?></p>
            <p><?php echo $account->getError(Constants::$passwordInvalidLength); ?></p>
            <label for="registerPassword">Password</label>
            <input id="registerPassword" name="registerPassword" type="password" placeholder="password" required>
          </p>
          <p>
            <label for="registerPassword2">Confirm Password</label>
            <input id="registerPassword2" name="registerPassword2" type="password" placeholder="password" required>
          </p>

          <button type="submit" name="register">SIGN UP</button>
          <div class="hasAccountText">
            <a href="#" ><span id="registerHide">Already have an account yet? Log in here</span></a>
          </div>
        </form> <!-- END -->
      </div>
      <div id="loginText">
        <h1>Get great music, right now</h1>
        <h2>Listen to loads of songs for free.</h2>
        <ul>
          <li>Discover music you'll fall in love with</li>
          <li>Create your own playlists</li>
          <li>Follow artists to keep up to date</li>
        </ul>
      </div>
    </div>
  </div>
</body>
</html>