<?php

if (isset($_POST['login'])){
  // Login button pressed
  $username         = sanitizeFormUsername($_POST['loginUsername']);
  $password         = sanitizeFormPassword($_POST['loginPassword']);
}

?>