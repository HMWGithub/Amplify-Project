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
  <title>Welcome to Beatify</title>
  <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>
  <div id="background">
    <div id="loginContainer">
      <div id="inputContainer">
        <!-- LOGIN FORM -->
        <form id="loginForm" action="register.php" method="POST">
          <h2>Login to your account</h2>
          <p>
            <p><?php echo $account->getError(Constants::$loginFailed); ?></p>
            <label for="loginUsername">Username</label>
            <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. beatifyUser123" required>
          </p>
          <p>
            <label for="loginPassword">Password</label>
            <input id="loginPassword" name="loginPassword" type="password" required>
          </p>

          <button type="submit" name="login">LOG IN</button>
        </form> <!-- END -->

        <!-- REGISTER FORM -->
        <form id="registerForm" action="register.php" method="POST">
          <h2>Create your free account</h2>
          <p>
            <p><?php echo $account->getError(Constants::$usernameInvalidLength); ?></p>
            <p><?php echo $account->getError(Constants::$usernameTaken); ?></p>
            <label for="registerUsername">Username</label>
            <input id="registerUsername" name="registerUsername" type="text" placeholder="e.g. beatifyUser123" value="<?php getInputValue('registerUsername')?>" required>
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
        </form> <!-- END -->
      </div>
    </div>
  </div>
</body>
</html>