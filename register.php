<?php 
  require_once("includes/classes/Account.php");

  $account = new Account();

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
</head>
<body>
  <div id="inputContainer">
    <!-- LOGIN FORM -->
    <form id="loginForm" action="register.php" method="POST">
      <h2>Login to your account</h2>
      <p>
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
        <p><?php echo $account->getError("Your username must be between 5 and 25 characters"); ?></p>
        <label for="registerUsername">Username</label>
        <input id="registerUsername" name="registerUsername" type="text" placeholder="e.g. beatifyUser123" required>
      </p>
      <p>
        <p><?php echo $account->getError("Your first name must be between 2 and 25 characters"); ?></p>
        <label for="registerFirstname">Firstname</label>
        <input id="registerFirstname" name="registerFirstname" type="text" placeholder="e.g. John" required>
      </p>
      <p>
        <p><?php echo $account->getError("Your last name must be between 2 and 25 characters"); ?></p>
        <label for="registerLastname">Lastname</label>
        <input id="registerLastname" name="registerLastname" type="text" placeholder="e.g. Smith" required>
      </p>
      <p>
        <p><?php echo $account->getError("Your emails do not match"); ?></p>
        <p><?php echo $account->getError("Your email is invalid"); ?></p>
        <label for="registerEmail">Email</label>
        <input id="registerEmail" name="registerEmail" type="email" placeholder="e.g. john@gmail.com" required>
      </p>
      <p>
        <label for="registerEmail2">Confirm Email</label>
        <input id="registerEmail2" name="registerEmail2" type="email" placeholder="e.g. john@gmail.com" required>
      </p>
      <p>
        <p><?php echo $account->getError("Your passwords do not match"); ?></p>
        <p><?php echo $account->getError("Your password can only contain numbers and letters"); ?></p>
        <p><?php echo $account->getError("Your password must be between 8 and 30 characters"); ?></p>
        <label for="registerPassword">Password</label>
        <input id="registerPassword" name="registerPassword" type="password" placeholder="Your password" required>
      </p>
      <p>
        <label for="registerPassword2">Confirm Password</label>
        <input id="registerPassword2" name="registerPassword2" type="password" placeholder="Your password" required>
      </p>

      <button type="submit" name="register">SIGN UP</button>
    </form> <!-- END -->

  </div>
</body>
</html>